<?php

namespace Modules\User\Tests\Unit\Filament\Resources;

use Modules\User\Filament\Resources\DeviceResource;
use Tests\TestCase;

/**
 * Class DeviceResourceTest.
 *
 * @covers \Modules\User\Filament\Resources\DeviceResource
 */
final class DeviceResourceTest extends TestCase
{
    private DeviceResource $deviceResource;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->deviceResource = new DeviceResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deviceResource);
    }

    public function testForm(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTable(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetRelations(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetPages(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
