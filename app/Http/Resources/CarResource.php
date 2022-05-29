<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'mark' => $this->mark,
            'model' => $this->model,
            'number' => $this->number,
            'drivers' => DriverResource::collection($this->drivers),
        ];
    }
}
