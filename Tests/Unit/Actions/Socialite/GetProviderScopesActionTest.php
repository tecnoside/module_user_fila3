<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\GetProviderScopesAction;
use Tests\TestCase;

/**
 * Class GetProviderScopesActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\GetProviderScopesAction
 */
final class GetProviderScopesActionTest extends TestCase
{
    private GetProviderScopesAction $getProviderScopesAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getProviderScopesAction = new GetProviderScopesAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getProviderScopesAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
