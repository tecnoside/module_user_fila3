<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Console\Commands;

use Modules\User\Console\Commands\AssignTeamCommand;
use Tests\TestCase;

/**
 * Class AssignTeamCommandTest.
 *
 * @covers \Modules\User\Console\Commands\AssignTeamCommand
 */
final class AssignTeamCommandTest extends TestCase
{
    private AssignTeamCommand $assignTeamCommand;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assignTeamCommand = new AssignTeamCommand;
        $this->app->instance(AssignTeamCommand::class, $this->assignTeamCommand);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->assignTeamCommand);
    }

    public function testHandle(): void
    {
        /* @todo This test is incomplete. */
        $this->artisan('command:name')
            ->expectsOutput('Some expected output')
            ->assertExitCode(0);
    }
}
