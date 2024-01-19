<?php

namespace Modules\User\Tests\Unit\Filament\Resources;

use Modules\User\Filament\Resources\PermissionResource;
use Tests\TestCase;

/**
 * Class PermissionResourceTest.
 *
 * @covers \Modules\User\Filament\Resources\PermissionResource
 */
final class PermissionResourceTest extends TestCase
{
    private PermissionResource $permissionResource;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->permissionResource = new PermissionResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->permissionResource);
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

    public function testGetNavigationBadge(): void
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
