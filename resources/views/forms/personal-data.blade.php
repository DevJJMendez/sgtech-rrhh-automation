@extends('layouts.register')
@push('form-styles')
    <link rel="stylesheet" href="{{ asset('css/forms/personal-data.css') }}">
@endpush
@section('content')
    <div class="form-container">
        <form action="{{ route('step.personal.store') }}" method="POST">
            @csrf

            <fieldset class="form-section">
                <legend>Datos Personales</legend>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="hiring_date">Fecha de ingreso</label>
                        <input type="date" id="hiring_date" name="hiring_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="job_position">Cargo / Especialidad</label>
                        <input type="text" id="job_position" name="job_position">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="dni">Número de cédula</label>
                        <input type="text" id="dni" name="dni">
                    </div>
                    <div class="input-group input-medium">
                        <label for="date_of_issue">Fecha de expedición</label>
                        <input type="date" id="date_of_issue" name="date_of_issue">
                    </div>
                    <div class="input-group input-medium">
                        <label for="place_of_issue">Lugar de expedición</label>
                        <input type="text" id="place_of_issue" name="place_of_issue">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="first_name">Nombre</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Ej. Juan">
                    </div>
                    <div class="input-group input-medium">
                        <label for="middle_name">Segundo Nombre</label>
                        <input type="text" id="middle_name" name="middle_name" placeholder="Ej. Carlos">
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="last_name">Apellido</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="second_last_name">Segundo Apellido</label>
                        <input type="text" id="second_last_name" name="second_last_name">
                    </div>
                </div>

                <div class="input-row">
                    <div class="input-group input-small">
                        <label for="gender">Sexo</label>
                        <select id="gender" name="gender">
                            <option value="">Seleccione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="input-group input-small">
                        <label for="blood_group">Grupo Sanguíneo y RH </label>
                        <select id="blood_group" name="blood_group">
                            <option value="">Seleccione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="input-group input-small">
                        <label for="marital_status">Estado Civil</label>
                        <select id="marital_status" name="marital_status">
                            <option value="">Seleccione</option>
                            <option value="single">Soltero</option>
                            <option value="married">Casado</option>
                        </select>
                    </div>

                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="birthdate">Fecha Nacimiento</label>
                        <input type="date" id="birthdate" name="birthdate">
                    </div>
                    <div class="input-group input-medium">
                        <label for="place_of_birth">Lugar De Nacimiento</label>
                        <select name="place_of_birth" id="place_of_birth"></select>
                    </div>


                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="nacionality">Nacionalidad</label>
                        <select name="nacionality" id="nacionality"></select>
                    </div>
                    <div class="input-group input-medium">
                        <label for="address">Dirección</label>
                        <input type="text" id="address" name="address">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="phone_number">Teléfono</label>
                        <input type="text" id="phone_number" name="phone_number">
                    </div>
                    <div class="input-group input-medium">
                        <label for="cellphone_number">Celular</label>
                        <input type="text" id="cellphone_number" name="cellphone_number">
                    </div>
                    <div class="input-group input-medium">
                        <label for="email">Correo electrónico</label>
                        <input type="text" id="email" name="email">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="banking_entity">Entidad bancaria</label>
                        <input type="text" id="banking_entity" name="banking_entity">
                    </div>
                    <div class="input-group input-medium">
                        <label for="account_number">Número de cuenta</label>
                        <input type="text" id="account_number" name="account_number">
                    </div>
                    <div class="input-group input-medium">
                        <label for="account_type">Tipo de cuenta</label>
                        <select name="account_type" id="account_type"></select>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="eps">EPS</label>
                        <input type="text" id="eps" name="eps">
                    </div>
                    <div class="input-group input-medium">
                        <label for="pension_fund">Fondo de pensiones</label>
                        <input type="text" id="birthdate" name="pension_fund">
                    </div>
                    <div class="input-group input-medium">
                        <label for="severance_pay_fund">Fondo de cesantías</label>
                        <select name="severance_pay_fund" id="severance_pay_fund"></select>
                    </div>
                </div>

            </fieldset>
            <fieldset class="form-section">
                <legend>Datos familiares</legend>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="relationship">Parentesco</label>
                        <input type="text" id="relationship" name="relationship">
                    </div>
                    <div class="input-group input-medium">
                        <label for="first_name">Nombres</label>
                        <input type="text" id="first_name" name="first_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Edad</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-small">
                        <label for="gender">Sexo</label>
                        <select id="gender" name="gender">
                            <option value="">Seleccione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="input-group input-medium">
                        <label for="birthdate">Fecha de nacimiento</label>
                        <input type="date" id="birthdate" name="birthdate">
                    </div>
                    <div class="input-group input-medium">
                        <label for="dni">Número de cédula</label>
                        <input type="text" id="dni" name="dni">
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-section">
                <legend>DATOS DE SALUD</legend>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="allergies">Alergias</label>
                        <input type="text" id="allergies" name="allergies">
                    </div>
                    <div class="input-group input-medium">
                        <label for="diseases">Enfermedades</label>
                        <input type="text" id="diseases" name="diseases">
                    </div>
                    <div class="input-group input-medium">
                        <label for="medications">Medicamentos</label>
                        <input type="text" id="medications" name="medications">
                    </div>
                    <div class="input-group input-medium">
                        <label for="additional_information">Información adicional que considere importante en relación con
                            su salud:
                        </label>
                        <input type="text" id="additional_information" name="additional_information">
                    </div>
                </div>
                <fieldset class="form-container">
                    <legend>EN CASO DE EMERGENCIA LLAMAR A: </legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="first_name">Nombre</label>
                            <input type="text" id="first_name" name="first_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Apellido</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>

                    </div>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="phone_number">Telefono / Celular</label>
                            <input type="text" id="phone_number" name="phone_number">
                        </div>
                        <div class="input-group input-medium">
                            <label for="relationship">Parentesco</label>
                            <input type="text" id="relationship" name="relationship">
                        </div>
                    </div>
                </fieldset>
            </fieldset>
            <button type="submit" class="btn-submit">Siguiente</button>
        </form>
    </div>
@endsection
