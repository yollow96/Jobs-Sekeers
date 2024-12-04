<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebRegisterRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'email' => 'required|email:filter|unique:users',
            'password' => 'nullable|same:password_confirmation|min:6',
            'privacyPolicy' => 'required',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'privacyPolicy.required' => 'You must agree to Terms and conditions.',
            // Hapus pesan ini karena tidak ada lagi reCAPTCHA
            // 'g-recaptcha-response.required' => 'You must verify google recaptcha.',
        ];
    }
}