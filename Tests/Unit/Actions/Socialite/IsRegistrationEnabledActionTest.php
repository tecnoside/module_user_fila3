<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\IsRegistrationEnabledAction;
use Tests\TestCase;

/**
 * Class IsRegistrationEnabledActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\IsRegistrationEnabledAction
 */
final class IsRegistrationEnabledActionTest extends TestCase
{
    private IsRegistrationEnabledAction $isRegistrationEnabledAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->isRegistrationEnabledAction = new IsRegistrationEnabledAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->isRegistrationEnabledAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
