<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryItemResource extends JsonResource
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
      "stock" => $latest_stock ? $latest_stock->quantity : 0
    ]);
  }
}
