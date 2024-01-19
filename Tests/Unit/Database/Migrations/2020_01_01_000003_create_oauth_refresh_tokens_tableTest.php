<?php

namespace Tests\Unit;

use CreateOauthRefreshTokensTable;
use Tests\TestCase;

/**
 * Class CreateOauthRefreshTokensTableTest.
 *
 * @covers \CreateOauthRefreshTokensTable
 */
final class CreateOauthRefreshTokensTableTest extends TestCase
{
    private CreateOauthRefreshTokensTable $createOauthRefreshTokensTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createOauthRefreshTokensTable = new CreateOauthRefreshTokensTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createOauthRefreshTokensTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
