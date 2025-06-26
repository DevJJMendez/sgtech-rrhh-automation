<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendWelcomeEmailTest extends TestCase
{
    use RefreshDatabase;

    public function form_is_visible_to_hr_user(): void
    {
        $response = $this->get(route('emails.form'));
        $response->assertStatus(200);
        $response->assertSee('Correo electrónico');
        $response->assertSee('Seleccionar rol');
    }
    public function email_must_be_valid_format()
    {
        $response = $this->post(route('emails.send'), [
            'email' => 'empleado@',
            'role' => 1
        ]);

        $response->assertSessionHasErrors('email');
    }
}
