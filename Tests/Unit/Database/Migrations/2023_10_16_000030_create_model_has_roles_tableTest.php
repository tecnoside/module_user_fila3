<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateModelHasRolesTableTest.
 *
 * @covers \CreateModelHasRolesTable
 */
final class CreateModelHasRolesTableTest extends TestCase
{
    private \CreateModelHasRolesTable $createModelHasRolesTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createModelHasRolesTable = new \CreateModelHasRolesTable;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createModelHasRolesTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
