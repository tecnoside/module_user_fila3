<?php

namespace Tests\Unit;

use CreateOauthClientsTable;
use Tests\TestCase;

/**
 * Class CreateOauthClientsTableTest.
 *
 * @covers \CreateOauthClientsTable
 */
final class CreateOauthClientsTableTest extends TestCase
{
    private CreateOauthClientsTable $createOauthClientsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createOauthClientsTable = new CreateOauthClientsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createOauthClientsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
