<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Lista de usuarios que han llenado la ficha de contratación
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif


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
                @forelse ($hiringSheets as $hiringSheet)
                    <tr class="hover:bg-gray-100">
                        <td colspan="2" class="px-4 py-3 whitespace-nowrap">
                            {{ $hiringSheet->first_name }} {{ $hiringSheet->last_name }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $hiringSheet->role }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $hiringSheet->job_position }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $hiringSheet->email }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $hiringSheet->phone_number }}</td>
                        <td class="px-4 py-3 whitespace-nowrap flex gap-2">
                            <button
                                class="btn-detail bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-md text-sm font-semibold shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition"
                                data-id="{{ $hiringSheet->personal_data_id }}">
                                Detalles
                            </button>
                            @if ($hiringSheet->uploadedDocuments->isNotEmpty())
                                <a href="{{ route('employees.download.all', $hiringSheet->personal_data_id) }}"
                                    class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-1.5 rounded-md text-sm font-semibold shadow focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-1 transition">
                                    Descargar documentos
                                </a>
                            @endif
                            <form method="POST"
                                action="{{ route('hiring.sheets.destroy', $hiringSheet->personal_data_id) }}"
                                onsubmit="return confirm('¿Estás seguro de eliminar esta ficha?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-sm font-semibold shadow">
                                    Eliminar
                                </button>
                            </form>

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
    {{-- modal --}}
    <div class="modal hidden" id="userDetailModal">
        <div class="modal-content">
            <button class="modal-close">&times;</button>
            <h2>Información adicional</h2>
            <div id="user-detail-content">
                <!-- Cargarás la información por AJAX o la inyectarás en el DOM -->
            </div>
        </div>
    </div>
</x-app-layout>
