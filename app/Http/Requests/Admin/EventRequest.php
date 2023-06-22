<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
        $common = [
            'task_name' => ['required', 'max:25'],
            'description' =>  ['required', 'max:25'],
        ];
        return $common;
    }

    public function messages()
    {
        return [
            'task_name.required' => 'Task Name name is required',
            'task_name.max' => 'Task Name name must not exceed the limit',
            'description.required' => 'Description is required',
            'description.max' => 'Description name must not exceed the limit',
        ];
    }
}
