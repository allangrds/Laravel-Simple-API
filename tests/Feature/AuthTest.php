<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    /** @test */
    public function it_will_authenticate()
    {
        $data = [
            'email'       => 'user@user.com',
            'password' => '123'
        ];

        $response = $this->post(route('auth.login'), $data);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_at'
        ]);
    }

    /** @test */
    public function it_will_logout()
    {
        $data = [
            'email'       => 'user@user.com',
            'password' => '123'
        ];

        $auth = $this->post(route('auth.login'), $data);
        $auth = $auth->json();

        $token = $auth['access_token'];
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $token",
        ])->post(route('auth.logout'));

        $response->assertStatus(200);
        $response->assertJson([
            "message" => "Successfully logged out"
        ]);
    }
}
