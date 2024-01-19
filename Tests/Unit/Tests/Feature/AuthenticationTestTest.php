<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\AuthenticationTest;
use Tests\TestCase;

/**
 * Class AuthenticationTestTest.
 *
 * @covers \Modules\User\Tests\Feature\AuthenticationTest
 */
final class AuthenticationTestTest extends TestCase
{
    private AuthenticationTest $authenticationTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->authenticationTest = new AuthenticationTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->authenticationTest);
    }

    public function testLoginScreenCanBeRendered(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUsersCanAuthenticateUsingTheLoginScreen(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUsersCanNotAuthenticateWithInvalidPassword(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
