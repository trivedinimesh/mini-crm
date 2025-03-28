<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'first_name' => ['required','string','max:50'],
            'last_name' => ['required','string','max:50'],
            'email' => ['required','email',Rule::unique('users')],
            'password' => ['required','confirmed','min:6'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'first_name' => strip_tags($this->input('first_name')),
            'last_name' => strip_tags($this->input('last_name')),
            'email' => strip_tags($this->input('email')),
            'password' => strip_tags($this->input('password')),
        ]);
    }
}
