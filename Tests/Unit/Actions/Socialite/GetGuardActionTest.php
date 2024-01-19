<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\GetGuardAction;
use Tests\TestCase;

/**
 * Class GetGuardActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\GetGuardAction
 */
final class GetGuardActionTest extends TestCase
{
    private GetGuardAction $getGuardAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getGuardAction = new GetGuardAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getGuardAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
