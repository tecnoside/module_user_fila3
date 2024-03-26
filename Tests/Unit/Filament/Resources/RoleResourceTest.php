<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Filament\Resources;

use Modules\User\Filament\Resources\RoleResource;
use Tests\TestCase;

/**
 * Class RoleResourceTest.
 *
 * @covers \Modules\User\Filament\Resources\RoleResource
 */
final class RoleResourceTest extends TestCase
{
    private RoleResource $roleResource;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->roleResource = new RoleResource;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->roleResource);
    }

    public function testGetPermissionPrefixes(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForm(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTable(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetRelations(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetPages(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetModel(): void
    {
        $expected = '42';
        $property = (new \ReflectionClass(RoleResource::class))
            ->getProperty('model');
        $property->setValue(null, $expected);
        self::assertSame($expected, RoleResource::getModel());
    }

    public function testGetResourceEntitiesSchema(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetResourceEntityPermissionsSchema(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetNavigationBadge(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRefreshSelectAllStateViaEntities(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRefreshEntitiesStatesViaSelectAll(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetPageEntityPermissionsSchema(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetWidgetEntityPermissionSchema(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetCustomEntities(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetCustomEntitiesPermisssionSchema(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
