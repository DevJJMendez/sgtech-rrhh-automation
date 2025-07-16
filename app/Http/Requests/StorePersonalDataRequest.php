<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:masculino,femenino'],

            'marital_status' => ['required', 'string', Rule::in(['soltero', 'casado', 'divorciado', 'viudo'])],
            'birthdate' => ['required', 'date', 'before_or_equal:today'],
            'place_of_birth' => ['required', 'string'],
            'blood_group' => ['required', 'string'],
            'dni' => ['required', 'numeric'],
            'date_of_issue' => ['required', 'date', 'before_or_equal:today'],
            'place_of_issue' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'cellphone_number' => ['required', 'string'],
            'email' => ['required', 'email'],
            'banking_entity' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'account_type' => ['required', 'string', 'in:corriente,ahorros,nomina'],
            'eps' => ['required', 'string'],
            // 'pension_fund' => ['required', 'string'],
            // 'severance_pay_fund' => ['required', 'string'],

            // family data
            'relationship' => ['required', 'string'],
            'family_data_dni' => ['required', 'numeric'],
            'full_name' => ['required', 'string'],
            'age' => ['required', 'string'],
            'family_data_gender' => ['required', 'string', 'in:masculino,femenino'],
            'family_data_birthdate' => ['required', 'string'],

            // health data
            // 'allergies' => ['required', 'string'],
            // 'diseases' => ['required', 'string'],
            // 'medications' => ['required', 'string'],
            // 'additional_information' => ['required', 'string'],

            // 'emergency_contact_full_name' => ['required', 'string'],
            // 'emergency_contact_phone_number' => ['required', 'string'],
            // 'emergency_contact_relationship' => ['required', 'string'],

            'academic_institution' => ['required', 'string'],
            'start_date' => ['required', 'date', 'before:today'],
            'end_date' => ['required', 'date'],
            'university_career' => ['required', 'string'],
            'degree' => ['required', 'string'],

            // 'languages' => ['required', 'string'],
            // 'language_level' => ['required', 'in:A1,A2,B1,B2,C1,C2'],

            // 'course' => ['required', 'string'],
            // 'specialty_start_date' => ['required', 'date', 'before:today'],
            // 'specialty_end_date' => ['required', 'date'],
            // 'specialty_academic_institution' => ['required', 'string'],
            // 'specialty_level' => ['required', 'string'],

            // 'technology' => ['required', 'string'],
            // 'knowledge_level' => ['required', 'in:basico,intermedio,avanzado'],
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute es obligatorio.',
            'string' => ':attribute debe ser texto.',
            'max' => ':attribute no debe exceder los :max caracteres.',
            'date' => ':attribute debe ser una fecha válida.',
            'before' => ':attribute debe ser anterior a hoy.',
            'before_or_equal' => ':attribute debe ser hoy o una anterior.',
            'email' => ':attribute debe ser un correo electrónico válido.',
            'numeric' => ':attribute debe ser un número.',
            'digits_between' => 'El :attribute debe tener entre :min y :max dígitos.',
            'unique' => 'El valor de :attribute ya está registrado.',
            'in' => ':attribute debe contener un valor válido.',
            'regex' => ':attribute tiene un formato inválido.',
        ];
    }
    public function attributes(): array
    {
        return [
            'dni' => 'Número de cedula',
            'hiring_date' => 'Fecha de contratación',
            'job_position' => 'Cargo',
            'first_name' => 'Primer nombre',
            'last_name' => 'Primer apellido',
            'birthdate' => 'Fecha de nacimiento',
            'gender' => 'Género',
            'marital_status' => 'Estado civil',
            'blood_group' => 'Grupo sanguíneo',
            'date_of_issue' => 'Fecha de expedición',
            'place_of_issue' => 'Lugar de expedición',
            'nationality' => 'Nacionalidad',
            'address' => 'Dirección',
            'place_of_birth' => 'Lugar de nacimiento',
            'phone_number' => 'Teléfono fijo',
            'cellphone_number' => 'Celular',
            'email' => 'Correo electrónico',
            'banking_entity' => 'Entidad bancaria',
            'account_number' => 'Número de cuenta',
            'account_type' => 'Tipo de cuenta',
            'eps' => 'EPS',
            'pension_fund' => 'Fondo de pensión',
            'severance_pay_fund' => 'Fondo de cesantías',

            'relationship' => 'Parentesco',
            'family_data_dni' => 'Número de cedula',
            'full_name' => 'Nombre',
            'age' => 'Edad',
            'famaly_data_gender' => 'Genero',
            'family_data_birthdate' => 'Fecha de nacimiento',

            'allergies' => 'Alergias',
            'diseases' => 'Enfermedades',
            'medications' => 'Medicamentos',
            'additional_information' => 'Información adicional',

            'emergency_contact_full_name' => 'Nombre',
            'emergency_contact_phone_number' => 'Teléfono fijo',
            'emergency_contact_relationship' => 'Parentesco',

            'academic_institution' => 'Institución academica',
            'start_date' => 'Fecha de inicio',
            'end_date' => 'Fecha de fin',
            'university_career' => 'Carrera universitaria',
            'degree' => 'Grado',
            'card_number' => 'Numero de tarjeta profesional',

            'course' => 'Curso',
            'specialty_start_date' => 'Fecha de inicio',
            'specialty_end_date' => 'Fecha de fin',
            'specialty_academic_institution' => 'Institución academica',
            'specialty_level' => 'Nivel',

            'technology' => 'Tecnología',
            'knowledge_level' => 'Nivel',

            'languages' => 'Lenguaje',
            'language_level' => 'Nivel',
        ];
    }
}
