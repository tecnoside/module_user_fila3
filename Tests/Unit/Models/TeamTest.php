<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\User\Models;

use Modules\User\Models\Team;
use Tests\TestCase;

/**
 * Class TeamTest.
 *
 * @covers \Modules\User\Models\Team
 */
final class TeamTest extends TestCase
{
    private Team $team;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->team = new Team();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->team);
    }

    public function testOwner(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testAllUsers(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUsers(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testMembers(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testHasUser(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testHasUserWithEmail(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUserHasPermission(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTeamInvitations(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRemoveUser(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testPurge(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
