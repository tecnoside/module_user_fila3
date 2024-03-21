<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Http\Controllers\Socialite;

use Modules\User\Http\Controllers\Socialite\LoginController;
use Tests\TestCase;

/**
 * Class LoginControllerTest.
 *
 * @covers \Modules\User\Http\Controllers\Socialite\LoginController
 */
final class LoginControllerTest extends TestCase
{
    private LoginController $loginController;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->loginController = new LoginController;
        $this->app->instance(LoginController::class, $this->loginController);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->loginController);
    }

    public function testRedirectToProvider(): void
    {
        /* @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }

    public function testCreateUser(): void
    {
        /* @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }

    public function testProcessCallback(): void
    {
        /* @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }
}
