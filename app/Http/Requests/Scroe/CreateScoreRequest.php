<?php

namespace App\Http\Requests\Scroe;

use Illuminate\Foundation\Http\FormRequest;

class CreateScoreRequest extends FormRequest
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
            'subject_id' => 'required',
            'student_id' => 'required',
            'attendance' => 'required|numeric',
            'scores_2_1' => 'required|numeric',
            'scores_2_2' => 'required|numeric',
            'final_score' => 'required|numeric',
            'medium_score' => 'required|numeric',
        ];
    }
}
