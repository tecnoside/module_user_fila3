<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
use Tests\TestCase;

/**
 * Class RetrieveOauthUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\RetrieveOauthUserAction
 */
final class RetrieveOauthUserActionTest extends TestCase
{
    private RetrieveOauthUserAction $retrieveOauthUserAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->retrieveOauthUserAction = new RetrieveOauthUserAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->retrieveOauthUserAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
