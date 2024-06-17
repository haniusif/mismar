<?php

namespace Modules\Mismar\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMismarOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mismar_order_id' => 'required|string|unique:mismar_orders,mismar_order_id',
            'mismar_customer_phone' => 'required|string',
            'mismar_car_plate' => 'required|string',
            'mismar_order_time' => 'required|date|date_format:Y-m-d H:i|after:now',
            'mismar_order_status' => 'required|string',
        ];
    }
}
