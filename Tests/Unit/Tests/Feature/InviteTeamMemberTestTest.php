<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\InviteTeamMemberTest;
use Tests\TestCase;

/**
 * Class InviteTeamMemberTestTest.
 *
 * @covers \Modules\User\Tests\Feature\InviteTeamMemberTest
 */
final class InviteTeamMemberTestTest extends TestCase
{
    private InviteTeamMemberTest $inviteTeamMemberTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->inviteTeamMemberTest = new InviteTeamMemberTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->inviteTeamMemberTest);
    }

    public function testTeamMembersCanBeInvitedToTeam(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTeamMemberInvitationsCanBeCancelled(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
