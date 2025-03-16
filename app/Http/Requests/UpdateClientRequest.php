<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'contact_name' => ['nullable','string','max:50'],
            'contact_email' => ['nullable','email', Rule::unique('clients')],
            'contact_phone_number' => ['nullable','string','max:20'],
            'company_name' => ['nullable','string','max:50'],
            'company_address' => ['nullable','string','max:100'],
            'company_city' => ['nullable','string','max:50'],
            'company_zip' => ['nullable','string','max:10'],
            'company_vat' => ['nullable','string','max:20'],
        ];
    }
}
