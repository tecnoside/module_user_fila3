<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Http\Controllers\Api;

use Modules\User\Http\Controllers\Api\LogoutController;
use Tests\TestCase;

/**
 * Class LogoutControllerTest.
 *
 * @covers \Modules\User\Http\Controllers\Api\LogoutController
 */
final class LogoutControllerTest extends TestCase
{
    private LogoutController $logoutController;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->logoutController = new LogoutController();
        $this->app->instance(LogoutController::class, $this->logoutController);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->logoutController);
    }

    public function testInvoke(): void
    {
        /* @todo This test is incomplete. */
        $this->getJson('/path')
            ->assertStatus(200);
    }
}
