<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\User\Models;

use Modules\User\Models\User;
use Tests\TestCase;

/**
 * Class UserTest.
 *
 * @covers \Modules\User\Models\User
 */
final class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->user = new User();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->user);
    }

    public function testCanAccessFilament(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetFilamentName(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testProfile(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testCanAccessPanel(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testDevices(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testNotifications(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetFullNameAttribute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
