<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LogoutTestTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'RoleTableSeeder']);
        $this->artisan('db:seed', ['--class' => 'UsersTableSeeder']);
        $this->artisan('passport:install');
    }

    /**
     * @test User logout
     */
    public function testLogout()
    {
        $user = factory(User::class)->create();

        Passport::actingAs($user);

        $response = $this->actingAs($user)->get('/user/logout');

        $response->assertSuccessful();
    }

    /**
     * @test User logout unauthenticated
     */
    public function testLogoutUnauthenticated()
    {
        $response = $this->get('/user/logout');

        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $response->getStatusCode());
    }
}
