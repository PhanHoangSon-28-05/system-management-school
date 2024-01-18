<?php

namespace App\Http\Requests\Subject;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubjecttRequest extends FormRequest
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
            'image_personal' => 'required',
            'image_citizenIdentification_front' => 'required',
            'image_citizenIdentification_backside' => 'required',
            'last_name' => 'required',
            'name' => 'required',
            'credit_hours' => 'required|numeric',
            'total_number_of_periods' => 'required|numeric',
            'description' => 'required',
        ];
    }
}
