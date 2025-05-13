<?php

namespace App\Http\Requests;

use App\Models\SchoolClass;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'name'    => 'required|string|max:255',
            'age'     => 'required|integer',
            'address' => 'required|string|max:255',
            'teacher_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'school_class_id' => ['required', 'array'],
            'school_class_id.*' => ['exists:' . SchoolClass::class . ',id'],
        ];
    }
}
