<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\StatusEnum;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'user_id' => ['required','integer', Rule::exist('users', 'id')],
            'client_id' => ['required','integer', Rule::exist('clients', 'id')],
            'deadline_at' => ['required','date'],
            'status' => ['required', Rule::enum(StatusEnum::class)],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => strip_tags($this->input('title')),
            'description' => strip_tags($this->input('description')),
            'user_id' => strip_tags($this->input('user_id')),
            'client_id' => strip_tags($this->input('client_id')),
            'deadline_at' => strip_tags($this->input('deadline_at')),
            'status' => strip_tags($this->input('status')),
        ]);
    }
}
