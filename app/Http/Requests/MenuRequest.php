<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'         => 'required|min:8|max:200',
            'price'         => 'required|between:0,9999.99',
            'weight'        => 'required|integer|min:1',
            'meat'          => 'required|integer|min:0|lte:weight',
            'about'         => 'required|min:16|max:256',
            'restaurant_id' => 'required',
        ];
    }
}