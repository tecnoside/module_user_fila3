<?php

declare(strict_types=1);

namespace Modules\User\Http\Tests\Feature\Controllers\Api;

use Modules\User\Http\Controllers\Api\RegisterController;
use Tests\TestCase;

/**
 * Class RegisterControllerTest.
 *
 * @covers \Modules\User\Http\Controllers\Api\RegisterController
 */
final class RegisterControllerTest extends TestCase
{
    private RegisterController $registerController;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->registerController = new RegisterController();
        $this->app->instance(RegisterController::class, $this->registerController);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->registerController);
    }

    public function testInvoke(): void
    {
        /* @todo This test is incomplete. */
        $this->getJson('/path')
            ->assertStatus(200);
    }
}
