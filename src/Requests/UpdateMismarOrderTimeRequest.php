<?php

namespace Modules\Mismar\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMismarOrderTimeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mismar_order_time' => 'required|date|date_format:Y-m-d H:i|after:now',
        ];
    }
}
