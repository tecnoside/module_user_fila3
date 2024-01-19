<?php

namespace Tests\Unit\Modules\User\Listeners;

use Illuminate\Auth\Events\Logout;
use Mockery;
use Modules\User\Listeners\LogoutListener;
use Tests\TestCase;

/**
 * Class LogoutListenerTest.
 *
 * @covers \Modules\User\Listeners\LogoutListener
 */
final class LogoutListenerTest extends TestCase
{
    private LogoutListener $logoutListener;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->logoutListener = new LogoutListener();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->logoutListener);
    }

    public function testHandle(): void
    {
        $event = Mockery::mock(Logout::class);

        /** @todo This test is incomplete. */
        $this->logoutListener->handle($event);
    }
}
