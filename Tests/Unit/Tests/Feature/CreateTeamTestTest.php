<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\CreateTeamTest;
use Tests\TestCase;

/**
 * Class CreateTeamTestTest.
 *
 * @covers \Modules\User\Tests\Feature\CreateTeamTest
 */
final class CreateTeamTestTest extends TestCase
{
    private CreateTeamTest $createTeamTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createTeamTest = new CreateTeamTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createTeamTest);
    }

    public function testTeamsCanBeCreated(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
