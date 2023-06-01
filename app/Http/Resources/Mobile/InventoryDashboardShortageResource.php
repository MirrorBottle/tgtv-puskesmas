<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryDashboardShortageResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return helperCamelizeArray([
      "id" => $this->id,
      "code" => $this->code,
      "name" => $this->name,
      "unit" => $this->unit,
      "quantity" => $this->stocks()->latest()->first()->quantity,
    ]);
  }
}
