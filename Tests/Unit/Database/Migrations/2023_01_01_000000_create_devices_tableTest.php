<?php

namespace Tests\Unit;

use CreateDevicesTable;
use Tests\TestCase;

/**
 * Class CreateDevicesTableTest.
 *
 * @covers \CreateDevicesTable
 */
final class CreateDevicesTableTest extends TestCase
{
    private CreateDevicesTable $createDevicesTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createDevicesTable = new CreateDevicesTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createDevicesTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
