<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\Tests\Unit\UserResource\RelationManagers;

use Modules\User\Filament\Resources\UserResource\RelationManagers\TokensRelationManager;
use Tests\TestCase;

/**
 * Class TokensRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\UserResource\RelationManagers\TokensRelationManager
 */
final class TokensRelationManagerTest extends TestCase
{
    private TokensRelationManager $tokensRelationManager;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->tokensRelationManager = new TokensRelationManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->tokensRelationManager);
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
