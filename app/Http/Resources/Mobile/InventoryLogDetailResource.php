<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryLogDetailResource extends JsonResource
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
      "type" => $this->type,
      "date" => helperFormatDate($this->date, 'd/m/Y H:i'),
      "admin_id" => $this->admin_id,
      "user_id" => $this->user_id,
      "user_name" => $this->user->name,
      "admin_id" => $this->admin_id ?? 0,
      "admin_name" => $this->admin ? $this->admin->name : "-",
      "note" => $this->note ?? "-",
      "validation_status" => (string) $this->validation_status,
      "validation_note" => $this->validation_note ?? "-",
      "validated_at" => helperFormatDate($this->validated_at, 'd/m/Y H:i'),
      "stocks" => $this->stocks->map(function($stock) {
        return helperCamelizeArray([
          "id" => $this->id,
          "name" => $stock->item->name,
          "code" => $stock->item->code,
          "unit" => $stock->item->unit,
          "quantity" => $stock->alter_quantity
        ]);
      })
    ]);
  }
}
