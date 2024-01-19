<?php

namespace Tests\Unit;

use CreateOauthPersonalAccessClientsTable;
use Tests\TestCase;

/**
 * Class CreateOauthPersonalAccessClientsTableTest.
 *
 * @covers \CreateOauthPersonalAccessClientsTable
 */
final class CreateOauthPersonalAccessClientsTableTest extends TestCase
{
    private CreateOauthPersonalAccessClientsTable $createOauthPersonalAccessClientsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createOauthPersonalAccessClientsTable = new CreateOauthPersonalAccessClientsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createOauthPersonalAccessClientsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
