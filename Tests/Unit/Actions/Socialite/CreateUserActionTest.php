<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\CreateUserAction;
use Tests\TestCase;

/**
 * Class CreateUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\CreateUserAction
 */
final class CreateUserActionTest extends TestCase
{
    private CreateUserAction $createUserAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createUserAction = new CreateUserAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createUserAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
