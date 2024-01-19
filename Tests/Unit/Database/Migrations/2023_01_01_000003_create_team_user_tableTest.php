<?php

namespace Tests\Unit;

use CreateTeamUserTable;
use Tests\TestCase;

/**
 * Class CreateTeamUserTableTest.
 *
 * @covers \CreateTeamUserTable
 */
final class CreateTeamUserTableTest extends TestCase
{
    private CreateTeamUserTable $createTeamUserTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createTeamUserTable = new CreateTeamUserTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createTeamUserTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
