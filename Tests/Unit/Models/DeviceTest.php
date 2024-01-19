<?php

namespace Tests\Unit\Modules\User\Models;

use Modules\User\Models\Device;
use Tests\TestCase;

/**
 * Class DeviceTest.
 *
 * @covers \Modules\User\Models\Device
 */
final class DeviceTest extends TestCase
{
    private Device $device;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->device = new Device();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->device);
    }

    public function testUsers(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
