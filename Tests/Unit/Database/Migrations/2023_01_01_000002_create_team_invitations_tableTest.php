<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateTeamInvitationsTableTest.
 *
 * @covers \CreateTeamInvitationsTable
 */
final class CreateTeamInvitationsTableTest extends TestCase
{
    private \CreateTeamInvitationsTable $createTeamInvitationsTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createTeamInvitationsTable = new \CreateTeamInvitationsTable;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createTeamInvitationsTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
