<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteServerTest extends TestCase
{

    use DatabaseMigrations;

    public function testPublicServerWithoutAuth()
    {

        $server = factory(Server::class)->create(['public' => true]);

        $request = $this->get(route('home.server.datatable'));

        $request->assertSee($server->name);
    }

    public function testPublicServerShowWithoutAuth()
    {
        $server = factory(Server::class)->create(['public' => true]);

        $request = $this->get(
            route('home.server.show', ['id' => $server->id])
        );

        $request->assertSee($server->name);
    }

    public function testPublicServerWithAuth()
    {
        $user = factory(User::class)->create();

        $server = factory(Server::class)->create(['public' => true]);

        $request = $this
            ->actingAs($user)
            ->get(route('home.server.datatable'));

        $request->assertSee($server->name);
    }

    public function testPublicServerShowWithAuth()
    {
        $user = factory(User::class)->create();

        $server = factory(Server::class)->create(['public' => true]);

        $request = $this
            ->actingAs($user)
            ->get(route('home.server.show', ['id' => $server->id]));

        $request->assertSee($server->name);
    }

    public function testPrivateServerWithoutAuth()
    {

        $server = factory(Server::class)->create(['public' => false]);

        $request = $this->get(route('home.server.datatable'));

        $request->assertDontSee($server->name);

    }

    public function testPrivateServerShowWithoutAuth()
    {
        $server = factory(Server::class)->create(['public' => false]);

        $request = $this->get(
            route('home.server.show', ['id' => $server->id])
        );

        $request->assertDontSee($server->name);
    }

    public function testPrivateServerWithAuth()
    {
        $user = factory(User::class)->create();

        $server = factory(Server::class)->create(['public' => false]);

        $request = $this
            ->actingAs($user)
            ->get(route('home.server.datatable'));

        $request->assertSee($server->name);
    }

    public function testPrivateServerShowWithAuth()
    {
        $user = factory(User::class)->create();

        $server = factory(Server::class)->create(['public' => false]);

        $request = $this
            ->actingAs($user)
            ->get(route('home.server.show', ['id' => $server->id]));

        $request->assertSee($server->name);
    }
}
