<?php

namespace App\Http\Requests\Mony;

use Illuminate\Foundation\Http\FormRequest;

class Walltet extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|exists:users,phone|numeric|min:10',
            'adress' =>'required|string',
        ];
    }
}
