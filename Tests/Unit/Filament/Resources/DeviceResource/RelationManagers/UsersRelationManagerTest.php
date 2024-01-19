<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\Tests\Unit\DeviceResource\RelationManagers;

use Modules\User\Filament\Resources\DeviceResource\RelationManagers\UsersRelationManager;
use Tests\TestCase;

/**
 * Class UsersRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\DeviceResource\RelationManagers\UsersRelationManager
 */
final class UsersRelationManagerTest extends TestCase
{
    private UsersRelationManager $usersRelationManager;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->usersRelationManager = new UsersRelationManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->usersRelationManager);
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