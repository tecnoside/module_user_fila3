<?php

namespace Modules\User\Filament\Tests\Unit\Pages\Tenancy;

use Modules\User\Filament\Pages\Tenancy\EditTeamProfile;
use Tests\TestCase;

/**
 * Class EditTeamProfileTest.
 *
 * @covers \Modules\User\Filament\Pages\Tenancy\EditTeamProfile
 */
final class EditTeamProfileTest extends TestCase
{
    private EditTeamProfile $editTeamProfile;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->editTeamProfile = new EditTeamProfile();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->editTeamProfile);
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
