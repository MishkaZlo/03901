<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //TODO вынести pivot атрибуты (скорректировать структуру), т.к. к ним не будет доступа при работе с моделью Driver без связей
        return [
            'id' => $this->id,
            'name' => $this->name,
            'start_time' => $this->pivot->start_time,
            'end_time' => $this->pivot->end_time,
        ];
    }
}
