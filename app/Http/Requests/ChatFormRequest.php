<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class ChatFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    #[Override]
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    #[Override]
    public function rules(): array
    {
        return [
            'question' => 'required|string|min:10|max:500',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, array<string>|string>
     */
    #[Override]
    public function messages(): array
    {
        return [
            'question.required' => 'error.question_required',
            'question.string' => 'error.question_string',
            'question.min' => 'error.question_min',
            'question.max' => 'error.question_max',
        ];
    }
}
