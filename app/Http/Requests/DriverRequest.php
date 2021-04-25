<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'driver_license_number' => 'required|string',
            'driver_license_validity_until' => 'required|date'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
