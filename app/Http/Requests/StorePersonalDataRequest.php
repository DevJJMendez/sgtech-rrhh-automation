<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalDataRequest extends FormRequest
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
            'hiring_date' => ['required', 'date'],
            'job_position' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'second_last_name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'marital_status' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'place_of_birth' => ['required', 'string'],
            'blood_group' => ['required', 'string'],
            'dni' => ['required', 'numeric'],
            'date_of_issue' => ['required', 'date'],
            'place_of_issue' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'cellphone_number' => ['required', 'string'],
            'email' => ['required', 'email'],
            'banking_entity' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'account_type' => ['required', 'string'],
            'eps' => ['required', 'string'],
            'pension_fund' => ['required', 'string'],
            'severance_pay_fund' => ['required', 'string']
        ];
    }
    public function messages(): array
    {
        return [
            'hiring_date.required' => 'La fecha de contratación es obligatoria.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 10 dígitos.',
            'email.unique' => 'Ya existe un registro con este correo.',
        ];
    }
}
