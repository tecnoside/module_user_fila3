<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Http\Controllers\Socialite;

use Modules\User\Http\Controllers\Socialite\ProcessCallbackController;
use Tests\TestCase;

/**
 * Class ProcessCallbackControllerTest.
 *
 * @covers \Modules\User\Http\Controllers\Socialite\ProcessCallbackController
 */
final class ProcessCallbackControllerTest extends TestCase
{
    private ProcessCallbackController $processCallbackController;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->processCallbackController = new ProcessCallbackController();
        $this->app->instance(ProcessCallbackController::class, $this->processCallbackController);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->processCallbackController);
    }

    public function testInvoke(): void
    {
        /* @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }
}
