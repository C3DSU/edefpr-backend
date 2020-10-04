<?php

namespace Tests\Feature\City;

use App\Models\State;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Store a specific city
     */
    public function testStore()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $city = [
            'name' => 'Test',
            'state_id' => factory(State::class)->create()
        ];

        $response = $this->actingAs($admin)->post('/city/', $city);

        $response->assertSuccessful();
    }
}
