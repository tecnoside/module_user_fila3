<?php

namespace Tests\Unit\Modules\User\Providers;

use Modules\User\Providers\UserServiceProvider;
use Tests\TestCase;

/**
 * Class UserServiceProviderTest.
 *
 * @covers \Modules\User\Providers\UserServiceProvider
 */
final class UserServiceProviderTest extends TestCase
{
    private UserServiceProvider $userServiceProvider;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->userServiceProvider = new UserServiceProvider();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userServiceProvider);
    }

    public function testBootCallback(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
