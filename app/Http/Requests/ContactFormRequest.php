<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class ContactFormRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email:dns|max:150',
            'message' => 'required|string|min:30|max:500',
        ];
    }

    /**
     * Get custom error messages for validation failures.
     *
     * @return array<string, string>
     */
    #[Override]
    public function messages(): array
    {
        return [
            'name.required' => 'error.name_required',
            'name.string' => 'error.name_string',
            'name.max' => 'error.name_max',
            'email.required' => 'error.email_required',
            'email.email' => 'error.email_email',
            'email.max' => 'error.email_max',
            'message.required' => 'error.message_required',
            'message.string' => 'error.message_string',
            'message.min' => 'error.message_min',
            'message.max' => 'error.message_max',
        ];
    }
}
