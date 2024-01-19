<?php

namespace Tests\Unit;

use CreateRoleHasPermissionsTable;
use Tests\TestCase;

/**
 * Class CreateRoleHasPermissionsTableTest.
 *
 * @covers \CreateRoleHasPermissionsTable
 */
final class CreateRoleHasPermissionsTableTest extends TestCase
{
    private CreateRoleHasPermissionsTable $createRoleHasPermissionsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createRoleHasPermissionsTable = new CreateRoleHasPermissionsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createRoleHasPermissionsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
