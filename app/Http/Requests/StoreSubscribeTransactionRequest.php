<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscribeTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return $this->user()->hasAnyRole(['owner']);
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'proof' => ['required', 'image', 'mimes:png,jpg,jpeg'], // Validates that the proof is an image file of type png, jpg, or jpeg.
        'user_id' => ['required', 'integer', 'exists:users,id'], // Ensures user_id is a valid integer and exists in the users table.
        'total_amount' => ['required', 'numeric', 'min:0'], // Ensures total_amount is a numeric value and not negative.
        'is_paid' => ['required', 'boolean'], // Validates that is_paid is a boolean value (true or false).
        'updated_at' => ['required', 'date'], // Validates that updated_at is a valid date.
        'created_at' => ['required', 'date'], // Validates that created_at is a valid date.
    ];
}

}
