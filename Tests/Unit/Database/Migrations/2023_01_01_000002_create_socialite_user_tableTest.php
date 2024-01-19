<?php

namespace Tests\Unit;

use CreateSocialiteUserTable;
use Tests\TestCase;

/**
 * Class CreateSocialiteUserTableTest.
 *
 * @covers \CreateSocialiteUserTable
 */
final class CreateSocialiteUserTableTest extends TestCase
{
    private CreateSocialiteUserTable $createSocialiteUserTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createSocialiteUserTable = new CreateSocialiteUserTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createSocialiteUserTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
