<?php

namespace Modules\Mismar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MismarOrder extends Model
{
    use HasFactory;

    protected $table = 'mismar_orders';

    protected $fillable = [
        'mismar_order_id',
        'mismar_customer_phone',
        'mismar_customer_lat',
        'mismar_customer_long',
        'mismar_customer_address',
        'mismar_car_plate',
        'mismar_order_time',
        'mismar_order_status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->mismar_order_status = $model->mismar_order_status ?: config('mismar.default_status');
        });
    }

    public function cancel()
    {
        $this->update(['mismar_order_status' => 'cancelled']);
    }
}
