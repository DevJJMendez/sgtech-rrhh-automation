<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function registeredUsers()
    {
        $registeredUsers = User::with('roles')->get();
        return view('users.registered-users', compact('registeredUsers'));
    }
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id'); // Para mostrar en un <select>
        return view('users.edit-registered-user', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('all.registered.users')->with('success', 'Usuario actualizado correctamente.');
    }
    public function deleteRegisteredUser(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->route('all.registered.users')->with('error', 'No puedes eliminar tu propio usuario.');
        }
        try {
            $user->deleteOrFail();
            return redirect()->route('all.registered.users')->with('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $exception) {
            return redirect()->route('all.registered.users')->with('error', 'Error al eliminar el usuario.');
        }
    }
}
