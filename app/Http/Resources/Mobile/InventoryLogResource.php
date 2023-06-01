<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryLogResource extends JsonResource
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
      "date" => helperFormatDate($this->date, 'd/m/Y H:i'),
      "user_id" => $this->user_id,
      "user_name" => $this->user->name,
      "type" => $this->type,
      "note" => $this->note ?? "-",
      "items_count" => $this->stocks->count()
    ]);
  }
}
