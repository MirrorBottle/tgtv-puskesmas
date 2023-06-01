<?php

namespace App\Http\Controllers\Api;

use App\Helper\JsonResponse;
use App\Http\Resources\Web\InventoryLogItemsResource;
use App\Models\InventoryItem;
use App\Models\InventoryStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\InventoryDashboardShortageResource;
use App\Http\Resources\Mobile\InventoryValidationDetailResource;
use App\Http\Resources\Mobile\InventoryValidationResource;
use App\Models\InventoryLog;
use Illuminate\Http\Response;

class InventoryDashboardController extends Controller
{

  public function index()
  {
    $user = auth()->user();
    $inventory_in = InventoryLog::select("date")
      ->where("type", InventoryLog::$INVENTORY_IN)
      ->when($user->is_role_user, function ($query) use ($user) {
        return $query->where("user_id", $user->id);
      })
      ->orderBy("id", "desc")
      ->first();
    $inventory_out = InventoryLog::select("date")
      ->where("type", InventoryLog::$INVENTORY_OUT)
      ->when($user->is_role_user, function ($query) use ($user) {
        return $query->where("user_id", $user->id);
      })
      ->orderBy("id", "desc")
      ->first();

    $shortage_data = InventoryItem::all()->filter(function($item) {
      return $item->low_quantity > $item->stocks()->latest()->first()->quantity;
    });

    return response()->json(new JsonResponse([
      "inventoryIn" => $inventory_in ? $inventory_in->date->format("d/m/y H:i") : "-",
      "inventoryOut" => $inventory_out ? $inventory_out->date->format("d/m/y H:i") : "-",
      "shortages" => InventoryDashboardShortageResource::collection($shortage_data)
    ]), Response::HTTP_OK);
  }
}
