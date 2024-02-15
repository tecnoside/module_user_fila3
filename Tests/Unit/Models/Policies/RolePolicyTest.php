<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Policies;

use App\User;
use Modules\User\Models\Policies\RolePolicy;
use Modules\User\Models\Role;
use Tests\TestCase;

/**
 * Class RolePolicyTest.
 *
 * @covers \Modules\User\Models\Policies\RolePolicy
 */
final class RolePolicyTest extends TestCase
{
    private RolePolicy $rolePolicy;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->rolePolicy = new RolePolicy;
        $this->user = new User;
        $this->app->instance(RolePolicy::class, $this->rolePolicy);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->rolePolicy, $this->user);
    }

    public function testViewAnyWhenUnauthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertFalse($this->user->can('viewAny', [RolePolicy::class]));
    }

    public function testViewAnyWhenAuthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertTrue($this->user->can('viewAny', [RolePolicy::class]));
    }

    public function testViewWhenUnauthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertFalse($this->user->can('view', $post));
    }

    public function testViewWhenAuthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertTrue($this->user->can('view', $post));
    }

    public function testCreateWhenUnauthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertFalse($this->user->can('create', [RolePolicy::class]));
    }

    public function testCreateWhenAuthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertTrue($this->user->can('create', [RolePolicy::class]));
    }

    public function testUpdateWhenUnauthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertFalse($this->user->can('update', $post));
    }

    public function testUpdateWhenAuthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertTrue($this->user->can('update', $post));
    }

    public function testAddTeamMemberWhenUnauthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertFalse($this->user->can('addTeamMember', $post));
    }

    public function testAddTeamMemberWhenAuthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertTrue($this->user->can('addTeamMember', $post));
    }

    public function testUpdateTeamMemberWhenUnauthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertFalse($this->user->can('updateTeamMember', $post));
    }

    public function testUpdateTeamMemberWhenAuthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertTrue($this->user->can('updateTeamMember', $post));
    }

    public function testRemoveTeamMemberWhenUnauthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertFalse($this->user->can('removeTeamMember', $post));
    }

    public function testRemoveTeamMemberWhenAuthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertTrue($this->user->can('removeTeamMember', $post));
    }

    public function testDeleteWhenUnauthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertFalse($this->user->can('delete', $post));
    }

    public function testDeleteWhenAuthorized(): void
    {
        /**
         * @todo This test is incomplete.
         */
        $post = \Mockery::mock(Role::class);

        self::assertTrue($this->user->can('delete', $post));
    }
}
