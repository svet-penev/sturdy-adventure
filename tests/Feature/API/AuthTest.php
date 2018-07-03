<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function auth_login()
    {
        $email = 'foo@barr.foo';
        $password = '123456';

        $user = factory(User::class)->create(['email'=>$email, 'password'=>\bcrypt($password)]);

        $response = $this->actingAs($user)->json('POST', 'api/auth/login', ['email'=>$email, 'password'=>$password]);

        $response->assertStatus(200);
        $data = json_decode($response->getContent(), 1);

        $this->assertArrayHasKey('status', $data);
        $this->assertEquals('success', $data['status']);
    }

    /** @test */
    public function auth_login_error()
    {
        $email = 'foo@barr.foo';
        $password = '123456';

        $user = factory(User::class)->create(['email'=>$email, 'password'=>$password]);

        $response = $this->actingAs($user)->json('POST', 'api/auth/login', ['email'=>$email, 'password'=>$password]);

        $response->assertStatus(400);
        $data = json_decode($response->getContent(), 1);

        $this->assertArrayHasKey('status', $data);
        $this->assertEquals('error', $data['status']);
    }


    /** @test */
    public function auth_logout()
    {
        $email = 'foo@barr.foo';
        $password = '123456';

        $user = factory(User::class)->create(['email'=>$email, 'password'=>\bcrypt($password)]);

        $response = $this->actingAs($user)->json('POST', 'api/auth/login', ['email'=>$email, 'password'=>$password]);

        $response->assertStatus(200);
        $data = json_decode($response->getContent(), 1);

        $this->assertArrayHasKey('status', $data);
        $this->assertEquals('success', $data['status']);
    }


}
