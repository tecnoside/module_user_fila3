<?php

namespace Tests\Unit\Modules\User\Enums;

use Modules\User\Enums\UserType;
use Tests\TestCase;

/**
 * Class UserTypeTest.
 *
 * @covers \Modules\User\Enums\UserType
 */
final class UserTypeTest extends TestCase
{
    private UserType $userType;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->userType = new UserType();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userType);
    }

    public function testGetDefaultGuard(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetLabel(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetColor(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetIcon(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCases(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testFrom(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTryFrom(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
