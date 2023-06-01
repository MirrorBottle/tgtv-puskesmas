<?php

namespace App\Http\Resources\Mobile;

use App\Models\InventoryLog;
use App\Models\InventoryStock;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryItemDetailResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $latest_stock = $this->stocks()->latest()->first();
    return helperCamelizeArray([
      "id" => $this->id,
      "name" => $this->name,
      "code" => $this->code,
      "unit" => $this->unit,
      "description" => $this->description ?? "-",
      "low_quantity" => $this->low_quantity,
      "inventory_category_id" => $this->inventory_category_id,
      "inventory_category_name" => $this->category->name,
      "stock" => $latest_stock ? $latest_stock->quantity : 0,
    ]);
  }
}
