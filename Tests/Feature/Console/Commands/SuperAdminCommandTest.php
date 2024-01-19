<?php

namespace Modules\User\Tests\Feature\Console\Commands;

use Modules\User\Console\Commands\SuperAdminCommand;
use Tests\TestCase;

/**
 * Class SuperAdminCommandTest.
 *
 * @covers \Modules\User\Console\Commands\SuperAdminCommand
 */
final class SuperAdminCommandTest extends TestCase
{
    private SuperAdminCommand $superAdminCommand;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->superAdminCommand = new SuperAdminCommand();
        $this->app->instance(SuperAdminCommand::class, $this->superAdminCommand);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->superAdminCommand);
    }

    public function testHandle(): void
    {
        /** @todo This test is incomplete. */
        $this->artisan('command:name')
            ->expectsOutput('Some expected output')
            ->assertExitCode(0);
    }
}
