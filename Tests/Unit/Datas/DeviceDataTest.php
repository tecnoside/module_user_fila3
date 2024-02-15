<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\User\Datas;

use Modules\User\Datas\DeviceData;
use Tests\TestCase;

/**
 * Class DeviceDataTest.
 *
 * @covers \Modules\User\Datas\DeviceData
 */
final class DeviceDataTest extends TestCase
{
    private DeviceData $deviceData;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->deviceData = new DeviceData;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deviceData);
    }

    public function testMake(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testIsValid(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetSynchronizationId(): void
    {
        $expected = '42';
        $property = (new \ReflectionClass(DeviceData::class))
            ->getProperty('synchronizationId');
        $property->setValue($this->deviceData, $expected);
        self::assertSame($expected, $this->deviceData->getSynchronizationId());
    }
}
