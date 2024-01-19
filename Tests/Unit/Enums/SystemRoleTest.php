<?php

namespace Tests\Unit\Modules\User\Enums;

use Modules\User\Enums\SystemRole;
use Tests\TestCase;

/**
 * Class SystemRoleTest.
 *
 * @covers \Modules\User\Enums\SystemRole
 */
final class SystemRoleTest extends TestCase
{
    private SystemRole $systemRole;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->systemRole = new SystemRole();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->systemRole);
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
