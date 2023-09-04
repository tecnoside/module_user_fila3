<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\TeamMemberManager;
use Livewire\Livewire;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

class UpdateTeamMemberRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function teamMemberRolesCanBeUpdated(): void
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $user->currentTeam->users()->attach(
            $otherUser = User::factory()->create(),
            ['role' => 'admin']
        );

        $component = Livewire::test(TeamMemberManager::class, ['team' => $user->currentTeam])
            ->set('managingRoleFor', $otherUser)
            ->set('currentRole', 'editor')
            ->call('updateRole');

        $this->assertTrue($otherUser->fresh()->hasTeamRole(
            $user->currentTeam->fresh(),
            'editor'
        ));
    }

    /**
     * @test
     */
    public function onlyTeamOwnerCanUpdateTeamMemberRoles(): void
    {
        $user = User::factory()->withPersonalTeam()->create();

        $user->currentTeam->users()->attach(
            $otherUser = User::factory()->create(),
            ['role' => 'admin']
        );

        $this->actingAs($otherUser);

        $component = Livewire::test(TeamMemberManager::class, ['team' => $user->currentTeam])
            ->set('managingRoleFor', $otherUser)
            ->set('currentRole', 'editor')
            ->call('updateRole')
            ->assertStatus(403);

        $this->assertTrue($otherUser->fresh()->hasTeamRole(
            $user->currentTeam->fresh(),
            'admin'
        ));
    }
}
