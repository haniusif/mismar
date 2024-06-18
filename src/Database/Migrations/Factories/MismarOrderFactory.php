<?php

namespace Modules\Mismar\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Mismar\Models\MismarOrder;

class MismarOrderFactory extends Factory
{
    protected $model = MismarOrder::class;

    public function definition()
    {
        return [
            'mismar_order_id' => $this->faker->unique()->uuid,
            'mismar_customer_phone' => $this->faker->phoneNumber,
            'mismar_customer_lat' => $this->faker->latitude,
            'mismar_customer_long' => $this->faker->longitude,
            'mismar_customer_address' => $this->faker->address,
            'mismar_car_plate' => strtoupper($this->faker->bothify('???###')),
            'mismar_order_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'mismar_order_status' => 'pending',
        ];
    }
}
