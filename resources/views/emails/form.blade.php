@extends('layouts.app')
@section('content')
    <div class="form-container">
        <form class="form" method="POST" action="welcome-email">
            @csrf
            <div class="title">Hola,<br><span>Aquí inicia el proceso de contratación</span></div>
            <input type="email" placeholder="Email" name="email" class="input">
            <select name="role" class="input">
                @forelse ($collaboratorRoles as $roles)
                    <option value="{{ $roles->collaborator_role_id }}">
                        {{ $roles->name }}
                    </option>
                @empty
                    <p>theres nothing</p>
                @endforelse
            </select>

            <button class="button-confirm" type="submit">Enviar →</button>
        </form>
    </div>
@endsection
