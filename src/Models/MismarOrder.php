<?php

namespace Modules\Mismar\Models;

use Illuminate\Database\Eloquent\Model;

class MismarOrder extends Model
{
    protected $fillable = [
        'mismar_order_id',
        'mismar_customer_phone',
        'mismar_car_plate',
        'mismar_order_time',
        'mismar_order_status',
    ];
}
