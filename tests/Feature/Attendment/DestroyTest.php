<?php

namespace Tests\Feature\Attendment;

use App\Models\Attendment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Delete a specific attendment
     */
    public function testDestroy()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $attendment = factory(Attendment::class)->create([
            'description' => 'Attendment test'
        ]);

        $response = $this->actingAs($admin)->get('/attendment/' . $attendment->id);

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->delete('/attendment/' . $attendment->id);

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->get('/attendment/' . $attendment->id);

        $response->assertNotFound();
    }
}
