<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:Pending,Onprogress,Completed',
            'project_id' => 'required|exists:projects,id',
            'employee_id' => 'nullable|exists:employees,id',
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
