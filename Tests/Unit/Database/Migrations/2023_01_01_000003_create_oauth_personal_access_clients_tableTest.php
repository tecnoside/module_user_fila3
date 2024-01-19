<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateOauthPersonalAccessClientsTableTest.
 *
 * @covers \CreateOauthPersonalAccessClientsTable
 */
final class CreateOauthPersonalAccessClientsTableTest extends TestCase
{
    private \CreateOauthPersonalAccessClientsTable $createOauthPersonalAccessClientsTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createOauthPersonalAccessClientsTable = new \CreateOauthPersonalAccessClientsTable();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createOauthPersonalAccessClientsTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
