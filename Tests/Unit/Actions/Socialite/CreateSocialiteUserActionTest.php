<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\CreateSocialiteUserAction;
use Tests\TestCase;

/**
 * Class CreateSocialiteUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\CreateSocialiteUserAction
 */
final class CreateSocialiteUserActionTest extends TestCase
{
    private CreateSocialiteUserAction $createSocialiteUserAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createSocialiteUserAction = new CreateSocialiteUserAction;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createSocialiteUserAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
