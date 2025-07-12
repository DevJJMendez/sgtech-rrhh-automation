{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Lista de usuarios registrados en el sistema
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="overflow-x-auto my-8 border border-gray-300 rounded-lg">
        <table class="w-full min-w-[1000px] border-collapse text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th colspan="2" class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Rol</th>
                    <th class="px-4 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($registeredUsers as $registeredUser)
                    <tr class="hover:bg-gray-100">
                        <td colspan="2" class="px-4 py-3 whitespace-nowrap">
                            {{ $registeredUser->name }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $registeredUser->email }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $registeredUser->roles->first()->name ?? 'Sin rol' }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap flex gap-2">
                            <a href="{{ route('users.edit', $registeredUser->id) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded-md text-sm font-semibold shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition">
                                Editar
                            </a>
                            <form action="{{ route('delete.registered.user', $registeredUser->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded-md text-sm font-semibold shadow focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-1 transition"
                                    type="submit">
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
</x-app-layout>
