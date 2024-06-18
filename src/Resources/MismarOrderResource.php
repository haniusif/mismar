<?php

namespace Modules\Mismar\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MismarOrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mismar_order_id' => $this->mismar_order_id,
            'mismar_customer_phone' => $this->mismar_customer_phone,
            'mismar_customer_lat' => $this->mismar_customer_lat,
            'mismar_customer_long' => $this->mismar_customer_long,
            'mismar_customer_address' => $this->mismar_customer_address,
            'mismar_car_plate' => $this->mismar_car_plate,
            'mismar_order_time' => $this->mismar_order_time,
            'mismar_order_status' => $this->mismar_order_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
