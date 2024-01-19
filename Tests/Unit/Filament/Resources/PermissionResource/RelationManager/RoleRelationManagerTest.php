<?php

namespace Modules\User\Filament\Resources\Tests\Unit\PermissionResource\RelationManager;

use Modules\User\Filament\Resources\PermissionResource\RelationManager\RoleRelationManager;
use Tests\TestCase;

/**
 * Class RoleRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\PermissionResource\RelationManager\RoleRelationManager
 */
final class RoleRelationManagerTest extends TestCase
{
    private RoleRelationManager $roleRelationManager;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->roleRelationManager = new RoleRelationManager();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->roleRelationManager);
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
}
