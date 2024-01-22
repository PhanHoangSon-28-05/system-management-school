<?php

namespace App\Http\Requests\Scheldule;

use Illuminate\Foundation\Http\FormRequest;

class CreateSchelduleRequest extends FormRequest
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
            'rank_id' => 'required',
            'period_ids' => 'required|array',
            'grade_id' => 'required',
            'subject_id' => 'required',
            'room_id' => 'required',
            'effect' => 'required',
        ];
    }
}
