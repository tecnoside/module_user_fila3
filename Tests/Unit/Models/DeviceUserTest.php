<?php

namespace Tests\Unit\Modules\User\Models;

use Modules\User\Models\DeviceUser;
use Tests\TestCase;

/**
 * Class DeviceUserTest.
 *
 * @covers \Modules\User\Models\DeviceUser
 */
final class DeviceUserTest extends TestCase
{
    private DeviceUser $deviceUser;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->deviceUser = new DeviceUser();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deviceUser);
    }

    public function testDevice(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
