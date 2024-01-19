<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\RegisterSocialiteUserAction;
use Tests\TestCase;

/**
 * Class RegisterSocialiteUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\RegisterSocialiteUserAction
 */
final class RegisterSocialiteUserActionTest extends TestCase
{
    private RegisterSocialiteUserAction $registerSocialiteUserAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->registerSocialiteUserAction = new RegisterSocialiteUserAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->registerSocialiteUserAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
