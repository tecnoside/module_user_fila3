<?php

namespace Modules\User\Tests\Unit\Database\Factories;

use Modules\User\Database\Factories\TeamFactory;
use Tests\TestCase;

/**
 * Class TeamFactoryTest.
 *
 * @covers \Modules\User\Database\Factories\TeamFactory
 */
final class TeamFactoryTest extends TestCase
{
    private TeamFactory $teamFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->teamFactory = new TeamFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->teamFactory);
    }

    public function testDefinition(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
