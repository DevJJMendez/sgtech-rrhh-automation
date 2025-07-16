<x-app-layout>
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Lista de invitaciones enviadas
        </h2>
    </x-slot>
    <div class="overflow-x-auto my-8 border border-gray-200 rounded-lg shadow">
        <table class="w-full min-w-[800px] border-collapse text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Rol</th>
                    <th class="px-4 py-3 text-left" colspan="1">Email</th>
                    <th class="px-4 py-3 text-left">Estado</th>
                    <th class="px-4 py-3 text-left">Fecha de envío</th>
                    <th class="px-4 py-3 text-left">Fecha de uso</th>
                    <th class="px-4 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($invitations as $invitation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $invitation->collaboratorRole->name }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $invitation->email }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span
                                class="
                            inline-block px-2 py-1 text-xs font-semibold rounded
                            {{ $invitation->status === 'used' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $invitation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $invitation->status === 'expired' ? 'bg-red-100 text-red-800' : '' }}
                        ">
                                {{ ucfirst($invitation->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $invitation->created_at->setTimezone('America/Bogota')->format('Y-m-d H:i:s') }}

                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $invitation->used_at ? \Carbon\Carbon::parse($invitation->used_at)->setTimezone('America/Bogota')->format('Y-m-d H:i') : '—' }}
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('invitations.destroy', $invitation->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta invitación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs shadow">
                                    Eliminar
                                </button>
                            </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                            No hay datos
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-app-layout>
