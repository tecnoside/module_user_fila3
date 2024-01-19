<?php

namespace Tests\Unit;

use CreateUsersTable;
use Tests\TestCase;

/**
 * Class CreateUsersTableTest.
 *
 * @covers \CreateUsersTable
 */
final class CreateUsersTableTest extends TestCase
{
    private CreateUsersTable $createUsersTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createUsersTable = new CreateUsersTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createUsersTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
