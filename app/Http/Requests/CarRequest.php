<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brand' => 'required|string',
            'model' => 'required|string',
            'gov_number' => 'required|string',
            'color' => 'required|string',
            'manufacture_year' => 'required|date_format:Y'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
