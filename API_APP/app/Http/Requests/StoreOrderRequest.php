<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'product_id' => ['required', 'max:255'],
            'product_name' => ['required', 'max:255'],
            'product_quantity' => ['required','integer','min:1'],
            'buyer_id' => ['required', 'max:255'],
            'buyer_name' => ['required', 'max:255'],
            'buyer_mobileno' => ['required', 'max:255'],
            'buyer_address' => ['required', 'max:255'],
            'billing_status' => ['required', 'max:255'],
            'billing_type' => ['required', 'max:255'],
            'order_price' => ['required', 'max:255'],
            'order_status' => ['required', 'max:255'],
            'order_notes' => ['required'],
            'priority' => ['required'],
            // 'seller_id' => ['required'],
            // 'seller_name' => ['required'],
        ];
    }
}
