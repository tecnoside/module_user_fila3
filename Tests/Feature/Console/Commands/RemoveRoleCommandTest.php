<?php

namespace Modules\User\Tests\Feature\Console\Commands;

use Modules\User\Console\Commands\RemoveRoleCommand;
use Tests\TestCase;

/**
 * Class RemoveRoleCommandTest.
 *
 * @covers \Modules\User\Console\Commands\RemoveRoleCommand
 */
final class RemoveRoleCommandTest extends TestCase
{
    private RemoveRoleCommand $removeRoleCommand;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->removeRoleCommand = new RemoveRoleCommand();
        $this->app->instance(RemoveRoleCommand::class, $this->removeRoleCommand);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->removeRoleCommand);
    }

    public function testHandle(): void
    {
        /** @todo This test is incomplete. */
        $this->artisan('command:name')
            ->expectsOutput('Some expected output')
            ->assertExitCode(0);
    }
}
