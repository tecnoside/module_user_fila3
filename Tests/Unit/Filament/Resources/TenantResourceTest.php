<?php

namespace Modules\User\Tests\Unit\Filament\Resources;

use Modules\User\Filament\Resources\TenantResource;
use Tests\TestCase;

/**
 * Class TenantResourceTest.
 *
 * @covers \Modules\User\Filament\Resources\TenantResource
 */
final class TenantResourceTest extends TestCase
{
    private TenantResource $tenantResource;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->tenantResource = new TenantResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->tenantResource);
    }

    public function testGetModel(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
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
