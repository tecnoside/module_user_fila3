<?php

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\UpdateTeamNameTest;
use Tests\TestCase;

/**
 * Class UpdateTeamNameTestTest.
 *
 * @covers \Modules\User\Tests\Feature\UpdateTeamNameTest
 */
final class UpdateTeamNameTestTest extends TestCase
{
    private UpdateTeamNameTest $updateTeamNameTest;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->updateTeamNameTest = new UpdateTeamNameTest();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->updateTeamNameTest);
    }

    public function testTeamNamesCanBeUpdated(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
