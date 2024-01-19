<?php

namespace Modules\User\Tests\Unit\Models\Policies;

use App\User;
use Mockery;
use Modules\User\Models\Policies\PermissionPolicy;
use Modules\User\Models\User as UserAlias;
use Tests\TestCase;

/**
 * Class PermissionPolicyTest.
 *
 * @covers \Modules\User\Models\Policies\PermissionPolicy
 */
final class PermissionPolicyTest extends TestCase
{
    private PermissionPolicy $permissionPolicy;

    private User $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->permissionPolicy = new PermissionPolicy();
        $this->user = new User();
        $this->app->instance(PermissionPolicy::class, $this->permissionPolicy);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->permissionPolicy);
        unset($this->user);
    }

    public function testViewAnyWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertFalse($this->user->can('viewAny', [PermissionPolicy::class]));
    }

    public function testViewAnyWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertTrue($this->user->can('viewAny', [PermissionPolicy::class]));
    }

    public function testViewWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $post = Mockery::mock(UserAlias::class);

        self::assertFalse($this->user->can('view', $post));
    }

    public function testViewWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $post = Mockery::mock(UserAlias::class);

        self::assertTrue($this->user->can('view', $post));
    }

    public function testCreateWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertFalse($this->user->can('create', [PermissionPolicy::class]));
    }

    public function testCreateWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertTrue($this->user->can('create', [PermissionPolicy::class]));
    }

    public function testUpdateWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $post = Mockery::mock(UserAlias::class);

        self::assertFalse($this->user->can('update', $post));
    }

    public function testUpdateWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $post = Mockery::mock(UserAlias::class);

        self::assertTrue($this->user->can('update', $post));
    }

    public function testDeleteWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $post = Mockery::mock(UserAlias::class);

        self::assertFalse($this->user->can('delete', $post));
    }

    public function testDeleteWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $post = Mockery::mock(UserAlias::class);

        self::assertTrue($this->user->can('delete', $post));
    }
}
