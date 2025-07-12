<x-app-layout>
    <br>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 text-center">
            Editar Usuario
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="input w-full border-gray-300 rounded">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block">Correo</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="input w-full border-gray-300 rounded">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="mb-4">
                <label class="block">Nueva contraseña <span class="text-gray-500 text-sm">(opcional)</span></label>
                <input type="password" name="password" class="input w-full border-gray-300 rounded"
                    placeholder="Dejar vacío para no cambiar">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div> --}}
            <div class="mb-4">
                <label class="block">Nueva contraseña <span class="text-gray-500 text-sm">(opcional)</span></label>
                <input type="password" name="password" class="input w-full border-gray-300 rounded"
                    placeholder="Dejar vacío para no cambiar">
                <p class="text-gray-500 text-sm mt-1">Por seguridad, no mostramos la contraseña actual.</p>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
