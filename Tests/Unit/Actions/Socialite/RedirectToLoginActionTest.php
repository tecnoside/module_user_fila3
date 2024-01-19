<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\RedirectToLoginAction;
use Tests\TestCase;

/**
 * Class RedirectToLoginActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\RedirectToLoginAction
 */
final class RedirectToLoginActionTest extends TestCase
{
    private RedirectToLoginAction $redirectToLoginAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->redirectToLoginAction = new RedirectToLoginAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->redirectToLoginAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
