<?php

namespace App\Http\Controllers\Api;

use App\Helper\JsonResponse;
use App\Models\InventoryStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\InventoryItemDetailResource;
use App\Http\Resources\Mobile\InventoryItemResource;
use App\Models\InventoryItem;
use Illuminate\Http\Response;

class InventoryItemController extends Controller
{

  public function index(Request $request)
  {
    $keyword = $request->keyword;
    $items = InventoryItem::when($request->filled('keyword'), function($q) use ($keyword) {
      $q->where('name', 'LIKE', "%$keyword%");
    })
      ->get();
    return InventoryItemResource::collection($items);
  }

  public function show($id)
  {
    $item = InventoryItem::find($id);
    return new InventoryItemDetailResource($item);
  }
}
