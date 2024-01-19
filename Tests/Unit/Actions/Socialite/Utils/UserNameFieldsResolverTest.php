<?php

declare(strict_types=1);

namespace Modules\User\Actions\Tests\Unit\Socialite\Utils;

use Laravel\Socialite\Contracts\User;
use Mockery\Mock;
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
use Tests\TestCase;

/**
 * Class UserNameFieldsResolverTest.
 *
 * @covers \Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver
 */
final class UserNameFieldsResolverTest extends TestCase
{
    private UserNameFieldsResolver $userNameFieldsResolver;

    private User|Mock $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = \Mockery::mock(User::class);
        $this->userNameFieldsResolver = new UserNameFieldsResolver($this->user);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userNameFieldsResolver, $this->user);
    }

    public function testMake(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
