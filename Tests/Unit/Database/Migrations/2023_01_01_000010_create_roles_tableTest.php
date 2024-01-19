<?php

namespace Tests\Unit;

use CreateRolesTable;
use Tests\TestCase;

/**
 * Class CreateRolesTableTest.
 *
 * @covers \CreateRolesTable
 */
final class CreateRolesTableTest extends TestCase
{
    private CreateRolesTable $createRolesTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createRolesTable = new CreateRolesTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createRolesTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
