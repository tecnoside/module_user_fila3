<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateTenantUserTableTest.
 *
 * @covers \CreateTenantUserTable
 */
final class CreateTenantUserTableTest extends TestCase
{
    private \CreateTenantUserTable $createTenantUserTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createTenantUserTable = new \CreateTenantUserTable();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createTenantUserTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
