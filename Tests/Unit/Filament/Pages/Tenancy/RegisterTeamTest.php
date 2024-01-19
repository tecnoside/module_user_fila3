<?php

declare(strict_types=1);

namespace Modules\User\Filament\Tests\Unit\Pages\Tenancy;

use Modules\User\Filament\Pages\Tenancy\RegisterTeam;
use Tests\TestCase;

/**
 * Class RegisterTeamTest.
 *
 * @covers \Modules\User\Filament\Pages\Tenancy\RegisterTeam
 */
final class RegisterTeamTest extends TestCase
{
    private RegisterTeam $registerTeam;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->registerTeam = new RegisterTeam();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->registerTeam);
    }

    public function testGetLabel(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testForm(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
