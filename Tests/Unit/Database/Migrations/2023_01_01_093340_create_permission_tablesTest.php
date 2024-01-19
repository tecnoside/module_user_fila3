<?php

namespace Tests\Unit;

use CreatePermissionTables;
use Tests\TestCase;

/**
 * Class CreatePermissionTablesTest.
 *
 * @covers \CreatePermissionTables
 */
final class CreatePermissionTablesTest extends TestCase
{
    private CreatePermissionTables $createPermissionTables;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createPermissionTables = new CreatePermissionTables();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createPermissionTables);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
