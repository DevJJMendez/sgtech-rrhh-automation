@extends('layouts.app')

@section('content')
    <div class="detail-wrapper">
        <h2 class="detail-title">Documentos cargados:</h2>

        @if ($user->)
            <ul class="document-list">
                @foreach ($user->uploadedDocuments as $document)
                    <li class="document-item">
                        <a href="{{ route('documents.show', $document->uploaded_document_id) }}" target="_blank"
                            class="document-link">
                            {{ $document->path }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('employees.download.all', $user->personal_data_id) }}" class="btn-download-zip">
                Descargar todos como ZIP
            </a>
        @else
            <p class="no-documents">No hay documentos cargados.</p>
        @endif

        <a href="{{ route('employees.table') }}" class="btn-back">
            ← Volver a la tabla
        </a>
    </div>
@endsection
