<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'     => 'required|min:5|max:100',
            'customers' => 'required|integer|min:0|max:100000',
            'emploees'  => 'required|integer|min:1|max:1000',
        ];
    }
}