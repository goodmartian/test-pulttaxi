<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'address_from' => 'required|string',
            'address_to' => 'required|string',
            'coordinate_from' => 'required|string',
            'coordinate_to' => 'required|string',
            'pricing_plan_id' => 'required|exists:pricing_plans,id'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
