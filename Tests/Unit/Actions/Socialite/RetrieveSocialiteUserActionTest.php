<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\RetrieveSocialiteUserAction;
use Tests\TestCase;

/**
 * Class RetrieveSocialiteUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\RetrieveSocialiteUserAction
 */
final class RetrieveSocialiteUserActionTest extends TestCase
{
    private RetrieveSocialiteUserAction $retrieveSocialiteUserAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->retrieveSocialiteUserAction = new RetrieveSocialiteUserAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->retrieveSocialiteUserAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
