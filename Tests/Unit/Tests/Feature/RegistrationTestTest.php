<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\RegistrationTest;
use Tests\TestCase;

/**
 * Class RegistrationTestTest.
 *
 * @covers \Modules\User\Tests\Feature\RegistrationTest
 */
final class RegistrationTestTest extends TestCase
{
    private RegistrationTest $registrationTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->registrationTest = new RegistrationTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->registrationTest);
    }

    public function testRegistrationScreenCanBeRendered(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRegistrationScreenCannotBeRenderedIfSupportIsDisabled(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testNewUsersCanRegister(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
