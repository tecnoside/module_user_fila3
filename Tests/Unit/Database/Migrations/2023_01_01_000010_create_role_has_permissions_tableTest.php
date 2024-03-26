<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateRoleHasPermissionsTableTest.
 *
 * @covers \CreateRoleHasPermissionsTable
 */
final class CreateRoleHasPermissionsTableTest extends TestCase
{
    private \CreateRoleHasPermissionsTable $createRoleHasPermissionsTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createRoleHasPermissionsTable = new \CreateRoleHasPermissionsTable;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createRoleHasPermissionsTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
