<?php

namespace Modules\User\Filament\Tests\Unit\Pages\Tenancy;

use Modules\User\Filament\Pages\Tenancy\EditTenantProfile;
use Tests\TestCase;

/**
 * Class EditTenantProfileTest.
 *
 * @covers \Modules\User\Filament\Pages\Tenancy\EditTenantProfile
 */
final class EditTenantProfileTest extends TestCase
{
    private EditTenantProfile $editTenantProfile;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->editTenantProfile = new EditTenantProfile();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->editTenantProfile);
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
