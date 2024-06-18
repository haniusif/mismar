<?php

namespace Modules\Mismar\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMismarOrderLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mismar_customer_lat' => 'required|string',
            'mismar_customer_long' => 'required|string',
            'mismar_customer_address' => 'required|string',
        ];
    }
}
