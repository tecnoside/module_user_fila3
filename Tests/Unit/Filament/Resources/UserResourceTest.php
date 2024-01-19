<?php

namespace Modules\User\Tests\Unit\Filament\Resources;

use Modules\User\Filament\Resources\UserResource;
use Tests\TestCase;

/**
 * Class UserResourceTest.
 *
 * @covers \Modules\User\Filament\Resources\UserResource
 */
final class UserResourceTest extends TestCase
{
    private UserResource $userResource;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->userResource = new UserResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userResource);
    }

    public function testGetNavigationBadge(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetWidgets(): void
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

    public function testHasCombinedRelationManagerTabsWithContent(): void
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
