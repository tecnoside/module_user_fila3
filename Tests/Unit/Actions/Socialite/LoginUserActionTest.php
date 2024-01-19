<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\LoginUserAction;
use Tests\TestCase;

/**
 * Class LoginUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\LoginUserAction
 */
final class LoginUserActionTest extends TestCase
{
    private LoginUserAction $loginUserAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->loginUserAction = new LoginUserAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->loginUserAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
