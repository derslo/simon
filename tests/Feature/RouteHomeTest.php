<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RouteHomeTest extends TestCase
{

    use DatabaseMigrations;

    public function testHomeWithoutAuthentication()
    {
        $response = $this->get('/');

        // Be sure to have the correct HTTP Status
        $response->assertStatus(200);

        // We want to see the login link, but acutally we don't want to see the register link
        $response->assertSee('Login');
        $response->assertDontSee('Register');

    }

    public function testHomeWithAuthentication()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get('/');

        //When logged in, in want to see the users Name, Logout and definetliy not Login
        $response->assertSee($user->name);
        $response->assertSee('Logout');
        $response->assertDontSee('Login');

    }
}
