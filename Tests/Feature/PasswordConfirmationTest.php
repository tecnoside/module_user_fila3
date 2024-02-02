<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function confirmPasswordScreenCanBeRendered(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $response = $this->actingAs($user)->get('/user/confirm-password');

        $response->assertStatus(200);
    }

    #[Test]
    public function passwordCanBeConfirmed(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(
            '/user/confirm-password', [
                'password' => 'password',
            ]
        );

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    #[Test]
    public function passwordIsNotConfirmedWithInvalidPassword(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(
            '/user/confirm-password', [
                'password' => 'wrong-password',
            ]
        );

        $response->assertSessionHasErrors();
    }
}
