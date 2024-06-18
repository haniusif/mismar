<?php

namespace Modules\Mismar\Models;

use Illuminate\Database\Eloquent\Model;

class MismarOrder extends Model
{
    protected $table = 'mismar_orders';

    protected $fillable = [
        'mismar_order_id',
        'mismar_customer_phone',
        'mismar_car_plate',
        'mismar_order_time',
        'mismar_order_status',
    ];

    /**
     * Boot method to initialize default values
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->mismar_order_status = config('mismar.default_status');
        });
    }

    /**
     * Cancel the order by updating the status.
     */
    public function cancel()
    {
        $this->update(['mismar_order_status' => 'cancelled']);
    }
}
