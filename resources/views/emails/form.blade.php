@extends('layouts.app')
@section('content')
    <div class="form-container">
        <form class="form" method="POST" action="{{ route('welcome-email') }}" id="emailForm">
            @csrf
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
            <button class="button-confirm" type="submit">
                Enviar
                <div>
                    <span id="spinner" class="spinner hidden"></span>
                </div>
            </button>
        </form>
    </div>
@endsection
