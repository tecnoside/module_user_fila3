<?php

namespace Modules\User\Http\Tests\Feature\Controllers\Api;

use Modules\User\Http\Controllers\Api\LoginController;
use Tests\TestCase;

/**
 * Class LoginControllerTest.
 *
 * @covers \Modules\User\Http\Controllers\Api\LoginController
 */
final class LoginControllerTest extends TestCase
{
    private LoginController $loginController;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->loginController = new LoginController();
        $this->app->instance(LoginController::class, $this->loginController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->loginController);
    }

    public function test__invoke(): void
    {
        /** @todo This test is incomplete. */
        $this->getJson('/path')
            ->assertStatus(200);
    }
}
