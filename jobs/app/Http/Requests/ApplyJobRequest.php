<?php

namespace App\Http\Requests;

use App\Models\JobApplication;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ApplyJobRequest
 */
class ApplyJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $expectedSalary = removeCommaFromNumbers($this->request->get('expected_salary'));

        $this->request->set('expected_salary', $expectedSalary);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'job_id' => 'required',
            'resume_id' => 'required',
            'expected_salary' => 'required|numeric|min:0|max:9999999999',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'resume_id.required' => 'The Resume Field is Required.',
            // Hapus pesan ini karena tidak ada lagi reCAPTCHA
            // 'g-recaptcha-response.required' => 'You must verify google recaptcha.',
        ];
    }
}