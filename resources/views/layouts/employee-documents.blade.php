@extends('layouts.app')

@section('content')
    <div class="detail-wrapper">
        <h2>Detalle del empleado</h2>

        <p><strong>Nombre:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
        <p><strong>DNI:</strong> {{ $user->dni }}</p>
        <p><strong>Correo:</strong> {{ $user->email }}</p>
        <p><strong>Puesto:</strong> {{ $user->job_position }}</p>
        <p><strong>EPS:</strong> {{ $user->eps }}</p>
        <hr>

        <h3>Documentos cargados:</h3>
        @if ($user->uploadedDocuments->isNotEmpty())
            <ul>
                @foreach ($user->uploadedDocuments as $document)
                    <li>
                        <a href="{{ route('documents.show', $document->uploaded_document_id) }}" target="_blank">
                            {{ $document->original_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay documentos cargados.</p>
        @endif

        <a href="{{ route('employees.table') }}" class="btn-back">Volver a la tabla</a>
    </div>
@endsection
