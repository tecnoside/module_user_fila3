<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateDevicesTableTest.
 *
 * @covers \CreateDevicesTable
 */
final class CreateDevicesTableTest extends TestCase
{
    private \CreateDevicesTable $createDevicesTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createDevicesTable = new \CreateDevicesTable();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createDevicesTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
