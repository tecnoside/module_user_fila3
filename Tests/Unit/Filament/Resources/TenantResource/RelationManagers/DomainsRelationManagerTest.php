<?php

namespace Modules\User\Filament\Resources\Tests\Unit\TenantResource\RelationManagers;

use Modules\User\Filament\Resources\TenantResource\RelationManagers\DomainsRelationManager;
use Tests\TestCase;

/**
 * Class DomainsRelationManagerTest.
 *
 * @covers \Modules\User\Filament\Resources\TenantResource\RelationManagers\DomainsRelationManager
 */
final class DomainsRelationManagerTest extends TestCase
{
    private DomainsRelationManager $domainsRelationManager;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->domainsRelationManager = new DomainsRelationManager();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->domainsRelationManager);
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
