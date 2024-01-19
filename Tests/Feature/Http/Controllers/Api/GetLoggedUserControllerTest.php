<?php

declare(strict_types=1);

namespace Modules\User\Http\Tests\Feature\Controllers\Api;

use Modules\User\Http\Controllers\Api\GetLoggedUserController;
use Tests\TestCase;

/**
 * Class GetLoggedUserControllerTest.
 *
 * @covers \Modules\User\Http\Controllers\Api\GetLoggedUserController
 */
final class GetLoggedUserControllerTest extends TestCase
{
    private GetLoggedUserController $getLoggedUserController;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->getLoggedUserController = new GetLoggedUserController();
        $this->app->instance(GetLoggedUserController::class, $this->getLoggedUserController);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getLoggedUserController);
    }

    public function testInvoke(): void
    {
        /* @todo This test is incomplete. */
        $this->getJson('/path')
            ->assertStatus(200);
    }
}
