<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\RegisterOauthUserAction;
use Tests\TestCase;

/**
 * Class RegisterOauthUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\RegisterOauthUserAction
 */
final class RegisterOauthUserActionTest extends TestCase
{
    private RegisterOauthUserAction $registerOauthUserAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->registerOauthUserAction = new RegisterOauthUserAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->registerOauthUserAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
