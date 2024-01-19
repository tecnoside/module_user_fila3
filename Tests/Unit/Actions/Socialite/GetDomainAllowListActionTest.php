<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\GetDomainAllowListAction;
use Tests\TestCase;

/**
 * Class GetDomainAllowListActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\GetDomainAllowListAction
 */
final class GetDomainAllowListActionTest extends TestCase
{
    private GetDomainAllowListAction $getDomainAllowListAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getDomainAllowListAction = new GetDomainAllowListAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getDomainAllowListAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
