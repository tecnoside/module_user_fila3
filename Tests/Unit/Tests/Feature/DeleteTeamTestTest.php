<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\DeleteTeamTest;
use Tests\TestCase;

/**
 * Class DeleteTeamTestTest.
 *
 * @covers \Modules\User\Tests\Feature\DeleteTeamTest
 */
final class DeleteTeamTestTest extends TestCase
{
    private DeleteTeamTest $deleteTeamTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->deleteTeamTest = new DeleteTeamTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->deleteTeamTest);
    }

    public function testTeamsCanBeDeleted(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testPersonalTeamsCantBeDeleted(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
