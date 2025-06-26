<?php

namespace Tests\Feature;

use App\Http\Requests\SendWelcomeEmailRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class SendWelcomeEmailRequestTest extends TestCase
{

    /** @test */
    public function email_field_is_required_and_must_be_valid()
    {
        $request = new SendWelcomeEmailRequest();

        $validator = Validator::make([
            'email' => 'invalid-email',
            'role' => '',
        ], $request->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('email', $validator->errors()->messages());
        $this->assertArrayHasKey('role', $validator->errors()->messages());
    }

}
