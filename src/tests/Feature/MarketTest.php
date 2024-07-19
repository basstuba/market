<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Profile;
use App\Models\User;

class MarketTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $admin;
    private $user;
    private $profile;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create([
            'name' => 'COACHTECH',
            'email' => 'coachtech@coachtech.com',
            'password' => bcrypt('coachtech'),
            'role' => 'admin',
        ]);

        $this->user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@testuser.com',
            'password' => bcrypt('password'),
        ]);

        $this->profile = Profile::factory()->create(['user_id' => $this->user->id]);
    }

    public function testProfile()
    {
        $response = $this->actingAs($this->user)->get('/profile/' . $this->user->id);

        $response->assertStatus(200);

        $response->assertViewHas('profile', $this->user->fresh()->load('profile'));
    }

    public function testProfileUpdate()
    {
        $testData = [
            'user_id' => $this->user->id,
            'name' => 'Test Name',
            'postcode' => 1234567,
            'address' => 'Test Address',
            'building' => 'Test Building',
        ];

        $response = $this->actingAs($this->user)
            ->post('/profile/update', $testData);

        $response->assertStatus(302)
            ->assertRedirect(route('profile', ['user' => $this->user->id]))
            ->assertSessionHas('message', 'プロフィールを変更しました');

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => 'Test Name',
        ]);

        $this->assertDatabaseHas('profiles', [
            'user_id' => $this->user->id,
            'postcode' => 1234567,
            'address' => 'Test Address',
            'building' => 'Test Building',
        ]);
    }

    public function testAdminUserDelete()
    {
        $this->assertDatabaseHas('users', ['id' => $this->user->id]);

        $response = $this->actingAs($this->admin)
            ->delete('/admin/user/delete', ['user_id' => $this->user->id]);

        $response->assertStatus(302)
            ->assertRedirect('/admin/user')
            ->assertSessionHas('message', '削除しました');

        $this->assertDatabaseMissing('users', ['id' => $this->user->id]);
    }
}
