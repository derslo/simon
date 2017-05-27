<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteServiceTest extends TestCase
{

    use DatabaseMigrations;

    public function testPublicServiceWithoutAuth()
    {

        $Service = factory(Service::class)->create(
            [
                'public' => true,
                'name'   => 'testService',
            ]
        );

        $request = $this->get(route('home.service.datatable'));

        $request->assertSee($Service->name);
    }

    public function testPublicServiceShowWithoutAuth()
    {
        $Service = factory(Service::class)->create(
            [
                'public' => true,
                'name'   => 'testService',
            ]
        );

        $request = $this->get(
            route('home.service.show', ['id' => $Service->id])
        );

        $request->assertSee($Service->name);
    }

    public function testPublicServiceWithAuth()
    {
        $user = factory(User::class)->create();

        $Service = factory(Service::class)->create(
            [
                'public' => true,
                'name'   => 'testService',
            ]
        );

        $request = $this
            ->actingAs($user)
            ->get(route('home.service.datatable'));

        $request->assertSee($Service->name);
    }

    public function testPublicServiceShowWithAuth()
    {
        $user = factory(User::class)->create();

        $Service = factory(Service::class)->create(['public' => true]);

        $request = $this
            ->actingAs($user)
            ->get(route('home.service.show', ['id' => $Service->id]));

        $request->assertSee($Service->name);
    }

    public function testPrivateServiceWithoutAuth()
    {

        $Service = factory(Service::class)->create(['public' => false]);

        $request = $this->get(route('home.service.datatable'));

        $request->assertDontSee($Service->name);
    }

    public function testPrivateServiceShowWithoutAuth()
    {
        $Service = factory(Service::class)->create(['public' => false]);

        $request = $this->get(
            route('home.service.show', ['id' => $Service->id])
        );

        $request->assertDontSee($Service->name);
    }

    public function testPrivateServiceWithAuth()
    {
        $user = factory(User::class)->create();

        $Service = factory(Service::class)->create(
            [
                'public' => false,
                'name'   => 'testService',
            ]
        );

        $request = $this
            ->actingAs($user)
            ->get(route('home.service.datatable'));

        $request->assertSee($Service->name);
    }

    public function testPrivateServiceShowWithAuth()
    {
        $user = factory(User::class)->create();

        $Service = factory(Service::class)->create(['public' => false]);

        $request = $this
            ->actingAs($user)
            ->get(route('home.service.show', ['id' => $Service->id]));

        $request->assertSee($Service->name);
    }
}
