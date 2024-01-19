<?php

namespace Modules\User\Tests\Unit\Models\Policies;

use App\User;
use Modules\User\Models\Policies\UserBasePolicy;
use Tests\TestCase;

/**
 * Class UserBasePolicyTest.
 *
 * @covers \Modules\User\Models\Policies\UserBasePolicy
 */
final class UserBasePolicyTest extends TestCase
{
    private UserBasePolicy $userBasePolicy;

    private User $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->userBasePolicy = $this->getMockBuilder(UserBasePolicy::class)
            ->setConstructorArgs([])
            ->getMockForAbstractClass();
        $this->user = new User();
        $this->app->instance(UserBasePolicy::class, $this->userBasePolicy);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userBasePolicy);
        unset($this->user);
    }

    public function testBeforeWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $ability = '42';

        self::assertFalse($this->user->can('before', $ability));
    }

    public function testBeforeWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $ability = '42';

        self::assertTrue($this->user->can('before', $ability));
    }
}
