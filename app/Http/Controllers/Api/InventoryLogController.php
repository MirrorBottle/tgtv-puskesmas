<?php

namespace App\Http\Controllers\Api;

use App\Helper\JsonResponse;
use App\Models\InventoryStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\InventoryLogResource;
use App\Http\Resources\Mobile\InventoryLogDetailResource;
use App\Models\InventoryItem;
use App\Models\InventoryLog;
use App\Traits\PushNotificationTrait;
use Carbon\CarbonImmutable;
use Illuminate\Http\Response;

class InventoryLogController extends Controller
{
  use PushNotificationTrait;
  public function history(Request $request)
  {
    $user = auth()->user();
    $start_date = Carbon::parse($request->start_date);
    $end_date = Carbon::parse($request->end_date);
    $logs = InventoryLog::with('user', 'stocks')
      ->select('*')
      ->whereBetween('date', [$start_date, $end_date])
      ->where("validation_status", "!=", 1)
      ->when($user->is_role_user, function($query) {
        return $query->where('user_id', auth()->user()->id);
      })
      ->orderBy("date", "desc")
      ->get();
    return InventoryLogResource::collection($logs);
  }

  public function detail($id)
  {
    $log = InventoryLog::find($id);
    return new InventoryLogDetailResource($log);
  }
  public function getLatestCode()
  {
    $today_date = Carbon::today()->format('dmy');
    $latest_log_today = InventoryLog::whereDate('date', Carbon::now())->first() ? str_pad(explode("-", InventoryLog::whereDate('date', Carbon::today())->orderBy('code', 'desc')->first()->code)[2] + 1, 3, 0, STR_PAD_LEFT) : '001';
    $id = "CK-$today_date-$latest_log_today";
    return $id;
  }
  public function store(Request $request)
  {
    $user = auth()->user();
    $type = $request->type;
    $note = $request->note;
    $today = CarbonImmutable::now();
    $code = $this->getLatestCode();
    $stocks = collect($request->inventory_stocks)->map(function ($stock) use ($type) {
      $quantity = $type == InventoryLog::$INVENTORY_OUT ? $stock['stock'] - $stock['quantity'] : $stock['stock'] + $stock['quantity'];
      $quantity = $quantity < 0 ? 0 : $quantity;
      return [
        "inventory_item_id" => $stock['inventory_item_id'],
        "date" => date("Y-m-d H:i:s"),
        "decrease" => $type == InventoryLog::$INVENTORY_OUT ? $stock['quantity'] : 0,
        "increase" => $type == InventoryLog::$INVENTORY_OUT ? 0 : $stock['quantity'],
        "quantity" => $quantity
      ];
    });

    if($type == InventoryLog::$INVENTORY_OUT) {
      $shortages = $stocks
        ->filter(function($stock) {
          $item = InventoryItem::find($stock['inventory_item_id']);
          return $item->low_quantity >= $stock['quantity'];
        });
      if(count($shortages) > 0) {
        $this->pushNotificationToAdmins("Stok Rendah", "Terdapat barang dengan stok rendah!");
      }
    }

    $log = InventoryLog::create([
      "user_id" => $user->id,
      "admin_id" => $user->is_role_admin ? $user->id : null,
      "code" => $code,
      "date" => date("Y-m-d H:i:s"),
      "note" => $note,
      "type" => $type,
      "validation_status" => $user->is_role_admin ? 2 : 1,
      "validated_at" => $user->is_role_admin ? date("Y-m-d H:i:s") : null,
    ]);

    $log->stocks()->createMany($stocks);


    return new InventoryLogDetailResource($log);
  }
}
