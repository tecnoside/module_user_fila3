<?php

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

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getLoggedUserController = new GetLoggedUserController();
        $this->app->instance(GetLoggedUserController::class, $this->getLoggedUserController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getLoggedUserController);
    }

    public function test__invoke(): void
    {
        /** @todo This test is incomplete. */
        $this->getJson('/path')
            ->assertStatus(200);
    }
}
