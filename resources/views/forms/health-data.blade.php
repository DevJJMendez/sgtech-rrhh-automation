@extends('layouts.register')
@push('form-styles')
    <link rel="stylesheet" href="{{ asset('css/forms/personal-data.css') }}">
@endpush
@section('content')
    <div class="form-container">
        <form action="" action="">
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
        </form>
    </div>
@endsection
