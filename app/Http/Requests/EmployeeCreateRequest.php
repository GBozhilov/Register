<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
{
    private const MIN_FIRST_NAME_LENGTH = 3;
    private const MAX_FIRST_NAME_LENGTH = 255;

    private const MIN_LAST_NAME_LENGTH = 3;
    private const MAX_LAST_NAME_LENGTH = 255;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $firstNameRules = 'required|max:' . self::MAX_FIRST_NAME_LENGTH . '|min:' . self::MIN_FIRST_NAME_LENGTH;
        $lastNameRules = 'max:' . self::MAX_LAST_NAME_LENGTH . '|min:' . self::MIN_LAST_NAME_LENGTH;

        return [
            'first_name' => $firstNameRules,
            'last_name' => $lastNameRules,
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'first_name.max' => 'First name should not be greater than ' . self::MAX_FIRST_NAME_LENGTH . ' symbols',
            'first_name.min' => 'First name should not be smaller than ' . self::MIN_FIRST_NAME_LENGTH . ' symbols',
            'first_name.required' => 'First name is required',

            'last_name.max' => 'Last name should not be greater than ' . self::MAX_FIRST_NAME_LENGTH . ' symbols',
            'last_name.min' => 'Last name should not be smaller than ' . self::MIN_FIRST_NAME_LENGTH . ' symbols',
        ];
    }
}
