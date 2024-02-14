<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\GetLoginRedirectRouteAction;
use Tests\TestCase;

/**
 * Class GetLoginRedirectRouteActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\GetLoginRedirectRouteAction
 */
final class GetLoginRedirectRouteActionTest extends TestCase
{
    private GetLoginRedirectRouteAction $getLoginRedirectRouteAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->getLoginRedirectRouteAction = new GetLoginRedirectRouteAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getLoginRedirectRouteAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
