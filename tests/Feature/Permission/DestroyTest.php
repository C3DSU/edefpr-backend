<?php

namespace Tests\Feature\Permission;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
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
     * @test Delete a specific permission
     */
    public function testDestroy()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('master');

        $permission = Permission::create([
            'name' => 'Test 1',
            'description' => 'Test 1'
        ]);

        $response = $this->actingAs($admin)->get('/permission/' . $permission->id);

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->delete('/permission/' . $permission->id);

        $response->assertSuccessful();

        $response = $this->actingAs($admin)->get('/permission/' . $permission->id);

        $response->assertNotFound();
    }
}
