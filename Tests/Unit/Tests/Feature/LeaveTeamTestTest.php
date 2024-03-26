<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\LeaveTeamTest;
use Tests\TestCase;

/**
 * Class LeaveTeamTestTest.
 *
 * @covers \Modules\User\Tests\Feature\LeaveTeamTest
 */
final class LeaveTeamTestTest extends TestCase
{
    private LeaveTeamTest $leaveTeamTest;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->leaveTeamTest = new LeaveTeamTest;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->leaveTeamTest);
    }

    public function testUsersCanLeaveTeams(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTeamOwnersCantLeaveTheirOwnTeam(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
