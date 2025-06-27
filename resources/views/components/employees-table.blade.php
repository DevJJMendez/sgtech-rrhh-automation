@extends('layouts.app')
@section('content')
    <div class="table-wrapper">
        <table class="candidate-table">
            <thead>
                <tr>
                    {{-- <th>id</th> --}}
                    <th>DNI</th>
                    <th colspan="2">Nombre</th>
                    <th>Puesto</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>EPS</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->dni }}</td>
                        <td colspan="2">
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                        </td>
                        <td>{{ $user->job_position }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->eps }}</td>
                        <td>
                            <button class="btn-detail" data-id="{{ $user->personal_data_id }}">
                                Ver detalles
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            <span>No hay datos</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- modal --}}
    <div class="modal hidden" id="userDetailModal">
        <div class="modal-content">
            <button class="modal-close">&times;</button>
            <h2>Detalle del usuario</h2>
            <div id="user-detail-content">
                <!-- Cargarás la información por AJAX o la inyectarás en el DOM -->
            </div>
        </div>
    </div>
@endsection
