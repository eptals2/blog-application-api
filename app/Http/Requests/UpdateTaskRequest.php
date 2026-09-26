<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'due_date' => 'sometimes|nullable|date',
            'status' => 'sometimes|required|in:Pending,Ongoing,Completed',
            'project_id' => 'sometimes|required|exists:projects,id',
            'employee_id' => 'sometimes|nullable|exists:employees,id',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if (
                $this->status === 'Completed' &&
                ! $this->employee_id
            ) {
                $validator->errors()->add(
                    'employee_id',
                    'A task cannot be completed without an assigned employee.'
                );
            }
        });
    }
}
