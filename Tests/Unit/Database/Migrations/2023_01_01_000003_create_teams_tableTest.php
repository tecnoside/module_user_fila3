<?php

namespace Tests\Unit;

use CreateTeamsTable;
use Tests\TestCase;

/**
 * Class CreateTeamsTableTest.
 *
 * @covers \CreateTeamsTable
 */
final class CreateTeamsTableTest extends TestCase
{
    private CreateTeamsTable $createTeamsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createTeamsTable = new CreateTeamsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createTeamsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
