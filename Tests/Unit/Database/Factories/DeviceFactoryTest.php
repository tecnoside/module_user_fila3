<?php

namespace Modules\User\Tests\Unit\Database\Factories;

use Modules\User\Database\Factories\DeviceFactory;
use Tests\TestCase;

/**
 * Class DeviceFactoryTest.
 *
 * @covers \Modules\User\Database\Factories\DeviceFactory
 */
final class DeviceFactoryTest extends TestCase
{
    private DeviceFactory $deviceFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->deviceFactory = new DeviceFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deviceFactory);
    }

    public function testDefinition(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
