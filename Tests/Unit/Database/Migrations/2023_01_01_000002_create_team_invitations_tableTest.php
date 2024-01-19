<?php

namespace Tests\Unit;

use CreateTeamInvitationsTable;
use Tests\TestCase;

/**
 * Class CreateTeamInvitationsTableTest.
 *
 * @covers \CreateTeamInvitationsTable
 */
final class CreateTeamInvitationsTableTest extends TestCase
{
    private CreateTeamInvitationsTable $createTeamInvitationsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createTeamInvitationsTable = new CreateTeamInvitationsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createTeamInvitationsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
