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
                        <label for="academic_institucion">Institución</label>
                        <input type="text" id="academic_institucion" name="academic_institucion">
                    </div>
                    <div class="input-group input-medium">
                        <label for="start_date">Fecha de inicio</label>
                        <input type="date" id="start_date" name="start_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="end_date">Fecha fin</label>
                        <input type="date" id="end_date" name="end_date">
                    </div>
                    <div class="input-group input-medium">
                        <label for="university_career">Carrera</label>
                        <input type="text" id="university_career" name="university_career">
                    </div>
                    <div class="input-group input-medium">
                        <label for="degree">Grado</label>
                        <input type="text" id="degree" name="degree">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group input-medium">
                        <label for="professional_card">Tarjeta profesional</label>
                        <select name="" id=""></select>
                    </div>
                    <div class="input-group input-medium">
                        <label for="card_number">Numero de Tarjeta profesional</label>
                        <input type="text" id="card_number" name="card_number">
                    </div>
                </div>
                <fieldset class="form-section">
                    <legend>Especialidad</legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="course">Curso</label>
                            <input type="text" id="course" name="course">
                        </div>
                        <div class="input-group input-medium">
                            <label for="start_date">Fecha de inicio</label>
                            <input type="date" id="start_date" name="start_date">
                        </div>
                        <div class="input-group input-medium">
                            <label for="end_date">Fecha fin</label>
                            <input type="date" id="end_date" name="end_date">
                        </div>
                        <div class="input-group input-medium">
                            <label for="academic_institution">Institución</label>
                            <input type="text" id="academic_institution" name="academic_institution">
                        </div>
                        <div class="input-group input-medium">
                            <label for="level">Nivel alcanzado</label>
                            <input type="text" id="level" name="level">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-section">
                    <legend>CONOCIMIENTO EN METODOLOGÍAS Y HERRAMIENTAS IT</legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="technology">Herramienta y/o tecnologia</label>
                            <input type="text" id="technology" name="technology">
                        </div>
                        <div class="input-group input-medium">
                            <label for="level">Nivel alcanzado</label>
                            <select name="level" id="">Básico</select>

                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-section">
                    <legend>IDIOMAS</legend>
                    <div class="input-row">
                        <div class="input-group input-medium">
                            <label for="languages">Idioma</label>
                            <input type="text" id="languages" name="languages">
                        </div>
                        <div class="input-group input-medium">
                            <label for="level">Nivel alcanzado</label>
                            <select name="level" id="">Básico</select>
                        </div>
                    </div>
                </fieldset>
            </fieldset>

            <button type="submit" class="btn-submit">Siguiente</button>
        </form>
    </div>
@endsection
