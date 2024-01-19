<?php

namespace Modules\User\Tests\Unit\Models\Policies;

use App\User;
use Mockery;
use Modules\User\Models\Policies\TeamPolicy;
use Modules\User\Models\Team;
use Tests\TestCase;

/**
 * Class TeamPolicyTest.
 *
 * @covers \Modules\User\Models\Policies\TeamPolicy
 */
final class TeamPolicyTest extends TestCase
{
    private TeamPolicy $teamPolicy;

    private User $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->teamPolicy = new TeamPolicy();
        $this->user = new User();
        $this->app->instance(TeamPolicy::class, $this->teamPolicy);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->teamPolicy);
        unset($this->user);
    }

    public function testViewAnyWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertFalse($this->user->can('viewAny', [TeamPolicy::class]));
    }

    public function testViewAnyWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertTrue($this->user->can('viewAny', [TeamPolicy::class]));
    }

    public function testViewWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('view', $team));
    }

    public function testViewWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('view', $team));
    }

    public function testCreateWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertFalse($this->user->can('create', [TeamPolicy::class]));
    }

    public function testCreateWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertTrue($this->user->can('create', [TeamPolicy::class]));
    }

    public function testUpdateWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('update', $team));
    }

    public function testUpdateWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('update', $team));
    }

    public function testAddTeamMemberWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('addTeamMember', $team));
    }

    public function testAddTeamMemberWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('addTeamMember', $team));
    }

    public function testUpdateTeamMemberWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('updateTeamMember', $team));
    }

    public function testUpdateTeamMemberWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('updateTeamMember', $team));
    }

    public function testRemoveTeamMemberWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('removeTeamMember', $team));
    }

    public function testRemoveTeamMemberWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('removeTeamMember', $team));
    }

    public function testDeleteWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('delete', $team));
    }

    public function testDeleteWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('delete', $team));
    }
}
