@extends('layouts.register')
@push('form-styles')
    <link rel="stylesheet" href="{{ asset('css/forms/personal-data.css') }}">
@endpush
@section('content')
    <div class="form-container">
        <form action="{{ route('step.academic.store') }}" method="POST">
            @csrf
            <fieldset class="form-section">
                <legend>Información Académica</legend>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="last_name">Institución</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Fecha de inicio</label>
                        <input type="date" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Fecha fin</label>
                        <input type="date" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Carrera</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Grado</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="last_name">Tarjeta profesional</label>
                        <select name="" id=""></select>
                    </div>
                    <div class="input-group input-medium">
                        <label for="last_name">Numero de Tarjeta profesional</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                </div>
                <fieldset class="form-section">
                    <legend>Especialidad</legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="last_name">Curso</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Fecha de inicio</label>
                            <input type="date" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Fecha fin</label>
                            <input type="date" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Institución</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Nivel alcanzado</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-section">
                    <legend>CONOCIMIENTO EN METODOLOGÍAS Y HERRAMIENTAS IT</legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="last_name">Herramienta y/o tecnologia</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Nivel alcanzado</label>
                            <select name="" id=""></select>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-section">
                    <legend>IDIOMAS</legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="last_name">Idioma</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        <div class="input-group input-medium">
                            <label for="last_name">Nivel alcanzado</label>
                            <select name="" id=""></select>
                        </div>
                    </div>
                </fieldset>
            </fieldset>

            <button type="submit" class="btn-submit">Siguiente</button>
        </form>
    </div>
@endsection
