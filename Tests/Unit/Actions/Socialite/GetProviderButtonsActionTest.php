<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\GetProviderButtonsAction;
use Tests\TestCase;

/**
 * Class GetProviderButtonsActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\GetProviderButtonsAction
 */
final class GetProviderButtonsActionTest extends TestCase
{
    private GetProviderButtonsAction $getProviderButtonsAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getProviderButtonsAction = new GetProviderButtonsAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getProviderButtonsAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
