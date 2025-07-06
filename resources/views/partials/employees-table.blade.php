{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Usuarios
        </h2>
    </x-slot>

    <div class="overflow-x-auto my-8 border border-gray-300 rounded-lg">
        <table class="w-full min-w-[1000px] border-collapse text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th colspan="2" class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Rol</th>
                    <th class="px-4 py-3 text-left">Posición</th>
                    <th class="px-4 py-3 text-left">Correo</th>
                    <th class="px-4 py-3 text-left">Teléfono</th>
                    <th class="px-4 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td colspan="2" class="px-4 py-3 whitespace-nowrap">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $user->role }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $user->job_position }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $user->phone_number }}</td>
                        <td class="px-4 py-3 whitespace-nowrap flex gap-2">
                            <button class="btn-detail" data-id="{{ $user->personal_data_id }}">
                                Detalles
                            </button>
                            {{-- <button
                                class="btn-detail bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-md text-sm font-semibold shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition"
                                data-id="{{ $user->personal_data_id }}">
                                Detalles
                            </button> --}}

                            @if ($user->uploadedDocuments->isNotEmpty())
                                <a href="{{ route('employees.download.all', $user->personal_data_id) }}"
                                    class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-1.5 rounded-md text-sm font-semibold shadow focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-1 transition">
                                    Descargar documentos
                                </a>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">No hay datos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación  --}}
    <div class="mt-4">
        {{ $users->links() }}
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
</x-app-layout>
