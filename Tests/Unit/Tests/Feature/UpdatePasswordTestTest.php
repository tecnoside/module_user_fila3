<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\UpdatePasswordTest;
use Tests\TestCase;

/**
 * Class UpdatePasswordTestTest.
 *
 * @covers \Modules\User\Tests\Feature\UpdatePasswordTest
 */
final class UpdatePasswordTestTest extends TestCase
{
    private UpdatePasswordTest $updatePasswordTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->updatePasswordTest = new UpdatePasswordTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->updatePasswordTest);
    }

    public function testPasswordCanBeUpdated(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCurrentPasswordMustBeCorrect(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testNewPasswordsMustMatch(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
