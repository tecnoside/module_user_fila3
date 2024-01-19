<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Tests\TestCase;

/**
 * Class IsUserAllowedActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\IsUserAllowedAction
 */
final class IsUserAllowedActionTest extends TestCase
{
    private IsUserAllowedAction $isUserAllowedAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->isUserAllowedAction = new IsUserAllowedAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->isUserAllowedAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
