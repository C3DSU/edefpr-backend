<?php

namespace Tests\Feature\Attendment;

use App\Http\Resources\Attendment as AttendmentResource;
use App\Models\Attendment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
    }

    /**
     * @test Get a specific attendment
     */
    public function testShow()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $attendment = factory(Attendment::class)->create();

        $response = $this->actingAs($admin)->get('/attendment/' . $attendment->id);

        $response->assertResource(AttendmentResource::make($attendment));
    }
}
