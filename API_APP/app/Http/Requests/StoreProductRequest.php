<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required','string','min:3','max:255'],
            'description' => 'required|string|min:10|max:1024',
            'category' => ['required','string'],
            'quantity' => ['required','integer','min:1'],
            'price' => ['required','numeric','min:0'],
            'product_pic' => ['required','image','mimes:jpeg,png,jpg'],
        ];
    }
}
