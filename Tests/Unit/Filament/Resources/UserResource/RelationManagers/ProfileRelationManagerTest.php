<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\Tests\Unit\UserResource\RelationManagers;

use Modules\User\Filament\Resources\UserResource\RelationManagers\ProfileRelationManager;
use Tests\TestCase;

/**
 * Class ProfileRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\UserResource\RelationManagers\ProfileRelationManager
 */
final class ProfileRelationManagerTest extends TestCase
{
    private ProfileRelationManager $profileRelationManager;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->profileRelationManager = new ProfileRelationManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->profileRelationManager);
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
