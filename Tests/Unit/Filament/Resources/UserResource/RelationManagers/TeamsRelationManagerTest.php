<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\Tests\Unit\UserResource\RelationManagers;

use Modules\User\Filament\Resources\UserResource\RelationManagers\TeamsRelationManager;
use Tests\TestCase;

/**
 * Class TeamsRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\UserResource\RelationManagers\TeamsRelationManager
 */
final class TeamsRelationManagerTest extends TestCase
{
    private TeamsRelationManager $teamsRelationManager;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->teamsRelationManager = new TeamsRelationManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->teamsRelationManager);
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
