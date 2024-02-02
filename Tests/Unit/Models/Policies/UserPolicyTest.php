<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Policies;

use App\User;
use Modules\User\Models\Policies\UserPolicy;
use Modules\User\Models\User as UserAlias;
use Tests\TestCase;

/**
 * Class UserPolicyTest.
 *
 * @covers \Modules\User\Models\Policies\UserPolicy
 */
final class UserPolicyTest extends TestCase
{
    private UserPolicy $userPolicy;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->userPolicy = new UserPolicy();
        $this->user = new User();
        $this->app->instance(UserPolicy::class, $this->userPolicy);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userPolicy, $this->user);
    }

    public function testViewAnyWhenUnauthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertFalse($this->user->can('viewAny', [UserPolicy::class]));
    }

    public function testViewAnyWhenAuthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertTrue($this->user->can('viewAny', [UserPolicy::class]));
    }

    public function testViewWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $post = \Mockery::mock(UserAlias::class);

        self::assertFalse($this->user->can('view', $post));
    }

    public function testViewWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $post = \Mockery::mock(UserAlias::class);

        self::assertTrue($this->user->can('view', $post));
    }

    public function testCreateWhenUnauthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertFalse($this->user->can('create', [UserPolicy::class]));
    }

    public function testCreateWhenAuthorized(): void
    {
        /* @todo This test is incomplete. */
        self::assertTrue($this->user->can('create', [UserPolicy::class]));
    }

    public function testUpdateWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $post = \Mockery::mock(UserAlias::class);

        self::assertFalse($this->user->can('update', $post));
    }

    public function testUpdateWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $post = \Mockery::mock(UserAlias::class);

        self::assertTrue($this->user->can('update', $post));
    }

    public function testDeleteWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $post = \Mockery::mock(UserAlias::class);

        self::assertFalse($this->user->can('delete', $post));
    }

    public function testDeleteWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $post = \Mockery::mock(UserAlias::class);

        self::assertTrue($this->user->can('delete', $post));
    }
}
