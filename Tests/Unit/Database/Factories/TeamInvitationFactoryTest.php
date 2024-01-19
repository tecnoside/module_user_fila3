<?php

namespace Modules\User\Tests\Unit\Database\Factories;

use Modules\User\Database\Factories\TeamInvitationFactory;
use Tests\TestCase;

/**
 * Class TeamInvitationFactoryTest.
 *
 * @covers \Modules\User\Database\Factories\TeamInvitationFactory
 */
final class TeamInvitationFactoryTest extends TestCase
{
    private TeamInvitationFactory $teamInvitationFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->teamInvitationFactory = new TeamInvitationFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->teamInvitationFactory);
    }

    public function testDefinition(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
