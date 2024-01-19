<?php

namespace Tests\Unit;

use CreateOauthAccessTokensTable;
use Tests\TestCase;

/**
 * Class CreateOauthAccessTokensTableTest.
 *
 * @covers \CreateOauthAccessTokensTable
 */
final class CreateOauthAccessTokensTableTest extends TestCase
{
    private CreateOauthAccessTokensTable $createOauthAccessTokensTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createOauthAccessTokensTable = new CreateOauthAccessTokensTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createOauthAccessTokensTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
