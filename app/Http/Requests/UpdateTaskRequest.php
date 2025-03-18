<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\TaskStatusEnum;

class UpdateTaskRequest extends FormRequest
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
            'project_id' => ['required','integer', Rule::exist('projects', 'id')],
            'deadline_at' => ['required','date'],
            'status' => ['required', Rule::enum(TaskStatusEnum::class)],
        ];
    }
}
