<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\UpdateTeamMemberRoleTest;
use Tests\TestCase;

/**
 * Class UpdateTeamMemberRoleTestTest.
 *
 * @covers \Modules\User\Tests\Feature\UpdateTeamMemberRoleTest
 */
final class UpdateTeamMemberRoleTestTest extends TestCase
{
    private UpdateTeamMemberRoleTest $updateTeamMemberRoleTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->updateTeamMemberRoleTest = new UpdateTeamMemberRoleTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->updateTeamMemberRoleTest);
    }

    public function testTeamMemberRolesCanBeUpdated(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testOnlyTeamOwnerCanUpdateTeamMemberRoles(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
