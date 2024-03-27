<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Console\Commands;

use Modules\User\Console\Commands\AssignModuleCommand;
use Tests\TestCase;

/**
 * Class AssignModuleCommandTest.
 *
 * @covers \Modules\User\Console\Commands\AssignModuleCommand
 */
final class AssignModuleCommandTest extends TestCase
{
    private AssignModuleCommand $assignModuleCommand;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assignModuleCommand = new AssignModuleCommand();
        $this->app->instance(AssignModuleCommand::class, $this->assignModuleCommand);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->assignModuleCommand);
    }

    public function testHandle(): void
    {
        /* @todo This test is incomplete. */
        $this->artisan('command:name')
            ->expectsOutput('Some expected output')
            ->assertExitCode(0);
    }
}
