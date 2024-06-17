<?php

namespace Modules\Mismar\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MismarOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mismar_order_id' => $this->mismar_order_id,
            'mismar_customer_phone' => $this->mismar_customer_phone,
            'mismar_car_plate' => $this->mismar_car_plate,
            'mismar_order_time' => $this->mismar_order_time,
            'mismar_order_status' => $this->mismar_order_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
