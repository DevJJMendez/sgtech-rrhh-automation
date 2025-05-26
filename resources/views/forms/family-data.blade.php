@extends('layouts.register')
@push('form-styles')
    <link rel="stylesheet" href="{{ asset('css/forms/personal-data.css') }}">
@endpush
@section('content')
    <div class="form-container">
        <form action="{{ route('step.family.store') }}" method="POST">
            @csrf
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
            <button type="submit" class="btn-submit">Siguiente</button>
        </form>
    </div>
@endsection
