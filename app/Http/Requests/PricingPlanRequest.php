<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingPlanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'min_cost' => 'required|numeric',
            'cost_per_kilometer' => 'required|numeric',
            'cost_per_minute' => 'required|numeric',
            'free_kilometers_amount' => 'required|numeric',
            'free_minutes_amount' => 'required|numeric',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
