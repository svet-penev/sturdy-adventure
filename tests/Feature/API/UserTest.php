<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_list()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('GET', 'api/users');

        $response->assertStatus(200);
        $data = json_decode($response->getContent(), 1);

        $this->assertArrayHasKey('links', $data);
        $this->assertArrayHasKey('meta', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals($user->id, $data['data'][0]['id']);
        $this->assertEquals($user->name, $data['data'][0]['name']);
        $this->assertEquals($user->email, $data['data'][0]['email']);
    }

    /** @test */
    public function user_get()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('GET', sprintf('api/users/%s', $user->id));

        $response->assertStatus(200);
        $data = json_decode($response->getContent(), 1);

        $this->assertArrayHasKey('data', $data);
        $this->assertEquals($user->id, $data['data']['id']);
        $this->assertEquals($user->name, $data['data']['name']);
        $this->assertEquals($user->email, $data['data']['email']);
    }

    /** @test */
    public function user_store()
    {
        $user = [
            'email' => 'faker@foo.bar',
            'name' => 'faker',
            'password' => '123456',
        ];

        $response = $this->json('POST', 'api/users', $user);

        $response->assertStatus(201);
        $data = json_decode($response->getContent(), 1);
        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('id', $data['data']);
        $this->assertEquals($user['name'], $data['data']['name']);
        $this->assertEquals($user['email'], $data['data']['email']);
    }

    /** @test */
    public function user_update()
    {
        $user = factory(User::class)->create();
        $newData = [
            'email' => 'faker@foo.bar',
            'name' => 'faker',
            'password' => '123456',
        ];

        $response = $this->actingAs($user)->json('PUT', sprintf('api/users/%s', $user->id), $newData);

        $response->assertStatus(200);
        $data = json_decode($response->getContent(), 1);

        $this->assertArrayHasKey('data', $data);
        $this->assertEquals($user->id, $data['data']['id']);
        $this->assertEquals($newData['name'], $data['data']['name']);
        $this->assertEquals($newData['email'], $data['data']['email']);
    }

    /** @test */
    public function user_delete()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('DELETE', sprintf('api/users/%s', $user->id));

        $response->assertStatus(200);
        $data = json_decode($response->getContent(), 1);

        $this->assertArrayHasKey('data', $data);
        $this->assertEquals($user->id, $data['data']['id']);
        $this->assertEquals($user->name, $data['data']['name']);
        $this->assertEquals($user->email, $data['data']['email']);
    }
}
