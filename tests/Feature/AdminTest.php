<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    public function test_guest_not_access()
    {
        $response = $this->assertGuest()->get(url('/admin'));;

        $response->assertStatus(302);
    }

    public function test_no_admin_not_access()
    {
        $user = User::where('is_admin', '=', false)->firstOrFail();
        $response = $this->actingAs($user)->get(url('/admin'));

        $response->assertStatus(302);
    }

    public function test_is_admin_access()
    {
        $user = User::where('is_admin', '=', true)->firstOrFail();
        $response = $this->actingAs($user)
            ->get(url('/admin'))
            ->assertViewIs('admin.main.index');

        $response->assertStatus(200);
    }

}
