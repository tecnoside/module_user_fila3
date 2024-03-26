<?php

declare(strict_types=1);

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

    protected function setUp(): void
    {
        parent::setUp();

        $this->provider = '42';
        $this->setDefaultRolesBySocialiteUserAction = new SetDefaultRolesBySocialiteUserAction($this->provider);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->setDefaultRolesBySocialiteUserAction, $this->provider);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
