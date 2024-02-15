<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\PasswordConfirmationTest;
use Tests\TestCase;

/**
 * Class PasswordConfirmationTestTest.
 *
 * @covers \Modules\User\Tests\Feature\PasswordConfirmationTest
 */
final class PasswordConfirmationTestTest extends TestCase
{
    private PasswordConfirmationTest $passwordConfirmationTest;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->passwordConfirmationTest = new PasswordConfirmationTest();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->passwordConfirmationTest);
    }

    public function testConfirmPasswordScreenCanBeRendered(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testPasswordCanBeConfirmed(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testPasswordIsNotConfirmedWithInvalidPassword(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
