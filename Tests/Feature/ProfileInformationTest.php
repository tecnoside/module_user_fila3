<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

final class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function currentProfileInformationIsAvailable(): void
    {
        $this->actingAs($user = User::factory()->create());

        $testable = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->name, $testable->state['name']);
        $this->assertEquals($user->email, $testable->state['email']);
    }

    #[Test]
    public function profileInformationCanBeUpdated(): void
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
            ->set('state', ['name' => 'Test Name', 'email' => 'test@example.com'])
            ->call('updateProfileInformation');

        $this->assertEquals('Test Name', $user->fresh()->name);
        $this->assertEquals('test@example.com', $user->fresh()->email);
    }
}
