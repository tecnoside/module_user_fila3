<?php

namespace Tests\Unit;

use CreateDeviceUserTable;
use Tests\TestCase;

/**
 * Class CreateDeviceUserTableTest.
 *
 * @covers \CreateDeviceUserTable
 */
final class CreateDeviceUserTableTest extends TestCase
{
    private CreateDeviceUserTable $createDeviceUserTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createDeviceUserTable = new CreateDeviceUserTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createDeviceUserTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
