<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear un rol base si es necesario
        Role::create(['name' => 'admin']);
    }
    public function test_registered_users_page_is_accessible()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('all.registered.users'));

        $response->assertStatus(200);
        $response->assertViewIs('users.registered-users');
    }
    public function test_edit_user_page_loads_correctly()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $userToEdit = User::factory()->create();

        $response = $this->get(route('users.edit', $userToEdit));

        $response->assertStatus(200);
        $response->assertViewIs('users.edit-registered-user');
        $response->assertViewHas('user', $userToEdit);
    }
    public function test_update_user_without_password()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $user = User::factory()->create();

        $response = $this->put(route('users.update', $user), [
            'name' => 'Nuevo Nombre',
            'email' => 'nuevo@email.com',
            'password' => null, // no se cambia contraseña
        ]);

        $response->assertRedirect(route('all.registered.users'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Nuevo Nombre',
            'email' => 'nuevo@email.com',
        ]);
    }

    public function test_update_user_with_new_password()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $user = User::factory()->create([
            'password' => bcrypt('oldpassword')
        ]);

        $response = $this->put(route('users.update', $user), [
            'name' => 'Nombre Modificado',
            'email' => 'modificado@email.com',
            'password' => 'newpassword123',
        ]);

        $response->assertRedirect(route('all.registered.users'));

        $this->assertTrue(
            Hash::check('newpassword123', $user->fresh()->password),
            'La contraseña no fue actualizada correctamente.'
        );
    }

    public function test_user_cannot_delete_themselves()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->delete(route('delete.registered.user', $user));

        $response->assertRedirect(route('all.registered.users'));
        $response->assertSessionHas('error', 'No puedes eliminar tu propio usuario.');

        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function test_user_can_be_deleted_by_another_user()
    {
        $admin = User::factory()->create();
        $this->actingAs($admin);

        $target = User::factory()->create();

        $response = $this->delete(route('delete.registered.user', $target));

        $response->assertRedirect(route('all.registered.users'));
        $response->assertSessionHas('success', 'Usuario eliminado correctamente.');

        $this->assertDatabaseMissing('users', ['id' => $target->id]);
    }
}
