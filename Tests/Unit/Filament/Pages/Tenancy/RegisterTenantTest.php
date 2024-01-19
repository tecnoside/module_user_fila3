<?php

namespace Modules\User\Filament\Tests\Unit\Pages\Tenancy;

use Modules\User\Filament\Pages\Tenancy\RegisterTenant;
use Tests\TestCase;

/**
 * Class RegisterTenantTest.
 *
 * @covers \Modules\User\Filament\Pages\Tenancy\RegisterTenant
 */
final class RegisterTenantTest extends TestCase
{
    private RegisterTenant $registerTenant;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->registerTenant = new RegisterTenant();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->registerTenant);
    }

    public function testGetLabel(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForm(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
