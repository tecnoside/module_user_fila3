<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Console\Commands;

use Modules\User\Console\Commands\AssignRoleCommand;
use Tests\TestCase;

/**
 * Class AssignRoleCommandTest.
 *
 * @covers \Modules\User\Console\Commands\AssignRoleCommand
 */
final class AssignRoleCommandTest extends TestCase
{
    private AssignRoleCommand $assignRoleCommand;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assignRoleCommand = new AssignRoleCommand;
        $this->app->instance(AssignRoleCommand::class, $this->assignRoleCommand);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->assignRoleCommand);
    }

    public function testHandle(): void
    {
        /* @todo This test is incomplete. */
        $this->artisan('command:name')
            ->expectsOutput('Some expected output')
            ->assertExitCode(0);
    }
}
