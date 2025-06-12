@extends('layouts.app')
@section('content')
    <div class="table-wrapper">
        <table class="candidate-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>DNI</th>
                    <th>Fecha de nacimiento</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->personal_data_id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->job_position }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->birthdate }}</td>
                        <td>
                            <button class="btn-detail" data-id="{{ $user->personal_data_id }}">
                                Ver detalles
                            </button>
                        </td>
                    </tr>
                @endforeach

                <!-- Más filas... -->
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
    <script>
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.getElementById('userDetailModal').classList.add('hidden');
            }
        });
        document.getElementById('userDetailModal').addEventListener('click', (e) => {
            // Si el clic fue sobre el fondo, y no sobre el contenido
            if (e.target === e.currentTarget) {
                e.currentTarget.classList.add('hidden');
            }
        });
        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelector('.modal-close').addEventListener('click', () => {
                    document.getElementById('userDetailModal').classList.add('hidden');
                });
                const userId = button.getAttribute('data-id');

                fetch(`/employees/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const user = data.data;
                            const content = `
                        <p><strong>Nombre:</strong> ${user.first_name}</p>                       
                    `;

                            document.getElementById('user-detail-content').innerHTML = content;
                            document.getElementById('userDetailModal').classList.remove('hidden');
                        } else {
                            alert('No se pudo cargar la información.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al cargar los datos:', error);
                        alert('Error al cargar los datos.');
                    });
            });
        });
    </script>
@endsection
