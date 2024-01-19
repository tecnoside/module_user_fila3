<?php

namespace Tests\Unit;

use CreatePermissionsTable;
use Tests\TestCase;

/**
 * Class CreatePermissionsTableTest.
 *
 * @covers \CreatePermissionsTable
 */
final class CreatePermissionsTableTest extends TestCase
{
    private CreatePermissionsTable $createPermissionsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createPermissionsTable = new CreatePermissionsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createPermissionsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
