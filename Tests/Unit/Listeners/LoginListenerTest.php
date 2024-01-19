<?php

namespace Tests\Unit\Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Mockery;
use Modules\User\Listeners\LoginListener;
use Tests\TestCase;

/**
 * Class LoginListenerTest.
 *
 * @covers \Modules\User\Listeners\LoginListener
 */
final class LoginListenerTest extends TestCase
{
    private LoginListener $loginListener;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loginListener = new LoginListener();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->loginListener);
    }

    public function testHandle(): void
    {
        $event = Mockery::mock(Login::class);

        /** @todo This test is incomplete. */
        $this->loginListener->handle($event);
    }
}
