<?php

namespace Modules\User\Http\Tests\Feature\Controllers\Api;

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

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->logoutController = new LogoutController();
        $this->app->instance(LogoutController::class, $this->logoutController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->logoutController);
    }

    public function test__invoke(): void
    {
        /** @todo This test is incomplete. */
        $this->getJson('/path')
            ->assertStatus(200);
    }
}
