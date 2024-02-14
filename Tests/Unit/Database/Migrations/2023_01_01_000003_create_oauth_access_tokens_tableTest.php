<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateOauthAccessTokensTableTest.
 *
 * @covers \CreateOauthAccessTokensTable
 */
final class CreateOauthAccessTokensTableTest extends TestCase
{
    private \CreateOauthAccessTokensTable $createOauthAccessTokensTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createOauthAccessTokensTable = new \CreateOauthAccessTokensTable();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createOauthAccessTokensTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
