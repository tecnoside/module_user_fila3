<?php

namespace Modules\User\Http\Tests\Feature\Controllers\Socialite;

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

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->processCallbackController = new ProcessCallbackController();
        $this->app->instance(ProcessCallbackController::class, $this->processCallbackController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->processCallbackController);
    }

    public function test__invoke(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }
}
