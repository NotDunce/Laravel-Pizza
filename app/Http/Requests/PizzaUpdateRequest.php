<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|string|min:3|max:40',
            'description'=>'required|string|min:20|max:500',
            'small_price'=>'required|numeric',
            'medium_price'=>'required|numeric',
            'large_price'=>'required|numeric',
            'category'=>'required',
            'image'=>'mimes:png,jpeg,jpg'
        ];
    }
}
