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
                        <label for="birth_date">Fecha de ingreso</label>
                        <input type="date" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Cargo / Especialidad</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="first_name">Nombre</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Ej. Juan">
                    </div>
                    <div class="input-group input-medium">
                        <label for="second_name">Segundo Nombre</label>
                        <input type="text" id="second_name" name="second_name" placeholder="Ej. Carlos">
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
                        <label for="sex">Sexo</label>
                        <select id="sex" name="sex">
                            <option value="">Seleccione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="input-group input-small">
                        <label for="civil_status">Estado Civil</label>
                        <select id="civil_status" name="civil_status">
                            <option value="">Seleccione</option>
                            <option value="single">Soltero</option>
                            <option value="married">Casado</option>
                        </select>
                    </div>

                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="birth_date">Fecha Nacimiento</label>
                        <input type="date" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Lugar De Nacimiento</label>
                        <select name="" id=""></select>
                    </div>


                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="birth_date">Nacionalidad</label>
                        <select name="" id=""></select>
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Dirección</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="birth_date">Teléfono</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Celular</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Correo electrónico</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="birth_date">Entidad bancaria</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Número de cuenta</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Tipo de cuenta</label>
                        <select name="" id=""></select>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="birth_date">EPS</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Fondo de pensiones</label>
                        <input type="text" id="birth_date" name="birth_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="birth_date">Fondo de cesantías</label>
                        <select name="" id=""></select>
                    </div>
                </div>

            </fieldset>
            <fieldset class="form-section">
                <legend>Datos familiares</legend>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="last_name">Parentesco</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Nombres</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Edad</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Sexo</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Fecha de nacimiento</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">DNI</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-section">
                <legend>DATOS DE SALUD</legend>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="last_name">Alergia</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Enfermedades</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Medicamentos</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                </div>
                <fieldset class="form-container">
                    <legend>EN CASO DE EMERGENCIA LLAMAR A: </legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="last_name">Nombre y Apellido</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Telefono / Celular</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Parentesco</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                    </div>
                </fieldset>
            </fieldset>
            <button type="submit" class="btn-submit">Siguiente</button>
        </form>
    </div>
@endsection
{{-- <div class="form-container">
        <form action="{{ route('step.personal.store') }}" method="POST">
            @csrf
            <div class="names-form">
                <label for="">Primer Nombre</label>
                <input type="text" name="" id="">
                <label for="">Segundo Nombre</label>
                <input type="text" name="" id="">
                <label for="">Primer Apellido</label>
                <input type="text" name="" id="">
                <label for="">Segundo Apellido</label>
            </div>
            <div class="second-data">
                <input type="text" name="" id="">
                <label for="">Sexo</label>
                <input type="text" name="" id="">
                <label for="">Estado Civil</label>
            </div>

            <div class="third-data">
                <input type="text" name="" id="">
                <label for="">Fecha de nacimiento</label>
                <input type="text" name="" id="">
                <label for="">Lugar de nacimiento</label>
                <input type="text" name="" id="">
                <label for="">Grupo Sanguineo</label>
                <input type="text" name="" id="">
                <label for="">Número de cedula</label>
                <input type="text" name="" id="">
                <label for="">Fecha de expedición</label>
                <input type="text" name="" id="">
                <label for="">Lugar de expedición</label>
                <input type="text" name="" id="">
            </div>
            <div class="fourd-data">
                <label for="">Dirección</label>
                <input type="text" name="" id="">
                <label for="">Telefono</label>
                <input type="text" name="" id="">
                <label for="">Celular</label>
                <input type="text" name="" id="">
                <label for="">Correo electronico</label>
                <input type="text" name="" id="">
            </div>
            <div class="fith-data">
                <label for="">Entidad bancaria</label>
                <input type="text" name="" id="">
                <label for="">Numero de cuenta bancaria</label>
                <input type="text" name="" id="">
                <label for="">Tipo de cuenta</label>
                <input type="text" name="" id="">
            </div>
            <div class="six-data">
                <label for="">EPS</label>
                <input type="text" name="" id="">
                <label for="">Fondo de pensiones</label>
                <input type="text" name="" id="">
                <label for="">Fondo de cesantías</label>
                <input type="text" name="" id="">
            </div>
            <button type="submit">next</button>
        </form>
    </div> --}}
