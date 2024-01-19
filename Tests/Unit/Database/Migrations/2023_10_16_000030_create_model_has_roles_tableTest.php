<?php

namespace Tests\Unit;

use CreateModelHasRolesTable;
use Tests\TestCase;

/**
 * Class CreateModelHasRolesTableTest.
 *
 * @covers \CreateModelHasRolesTable
 */
final class CreateModelHasRolesTableTest extends TestCase
{
    private CreateModelHasRolesTable $createModelHasRolesTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createModelHasRolesTable = new CreateModelHasRolesTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createModelHasRolesTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
