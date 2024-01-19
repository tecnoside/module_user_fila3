<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\Tests\Unit\UserResource\RelationManagers;

use Modules\User\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use Tests\TestCase;

/**
 * Class RolesRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\UserResource\RelationManagers\RolesRelationManager
 */
final class RolesRelationManagerTest extends TestCase
{
    private RolesRelationManager $rolesRelationManager;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->rolesRelationManager = new RolesRelationManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->rolesRelationManager);
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
}
