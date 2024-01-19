<?php

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\SetDefaultRolesBySocialiteUserAction;
use Tests\TestCase;

/**
 * Class SetDefaultRolesBySocialiteUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\SetDefaultRolesBySocialiteUserAction
 */
final class SetDefaultRolesBySocialiteUserActionTest extends TestCase
{
    private SetDefaultRolesBySocialiteUserAction $setDefaultRolesBySocialiteUserAction;

    private string $provider;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->provider = '42';
        $this->setDefaultRolesBySocialiteUserAction = new SetDefaultRolesBySocialiteUserAction($this->provider);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->setDefaultRolesBySocialiteUserAction);
        unset($this->provider);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
