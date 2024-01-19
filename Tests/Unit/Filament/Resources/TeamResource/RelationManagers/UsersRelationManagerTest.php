<?php

namespace Modules\User\Filament\Resources\Tests\Unit\TeamResource\RelationManagers;

use Modules\User\Filament\Resources\TeamResource\RelationManagers\UsersRelationManager;
use Tests\TestCase;

/**
 * Class UsersRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\TeamResource\RelationManagers\UsersRelationManager
 */
final class UsersRelationManagerTest extends TestCase
{
    private UsersRelationManager $usersRelationManager;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->usersRelationManager = new UsersRelationManager();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->usersRelationManager);
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
