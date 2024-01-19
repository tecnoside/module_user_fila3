<?php

namespace Tests\Unit;

use CreateOauthAuthCodesTable;
use Tests\TestCase;

/**
 * Class CreateOauthAuthCodesTableTest.
 *
 * @covers \CreateOauthAuthCodesTable
 */
final class CreateOauthAuthCodesTableTest extends TestCase
{
    private CreateOauthAuthCodesTable $createOauthAuthCodesTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createOauthAuthCodesTable = new CreateOauthAuthCodesTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createOauthAuthCodesTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
