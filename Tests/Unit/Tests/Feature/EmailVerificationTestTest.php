<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\EmailVerificationTest;
use Tests\TestCase;

/**
 * Class EmailVerificationTestTest.
 *
 * @covers \Modules\User\Tests\Feature\EmailVerificationTest
 */
final class EmailVerificationTestTest extends TestCase
{
    private EmailVerificationTest $emailVerificationTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->emailVerificationTest = new EmailVerificationTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->emailVerificationTest);
    }

    public function testEmailVerificationScreenCanBeRendered(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testEmailCanBeVerified(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testEmailCanNotVerifiedWithInvalidHash(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
