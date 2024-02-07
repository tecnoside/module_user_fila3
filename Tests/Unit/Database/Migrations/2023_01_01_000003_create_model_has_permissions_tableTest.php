<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class CreateModelHasPermissionsTableTest.
 *
 * @covers \CreateModelHasPermissionsTable
 */
final class CreateModelHasPermissionsTableTest extends TestCase
{
    private \CreateModelHasPermissionsTable $createModelHasPermissionsTable;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createModelHasPermissionsTable = new \CreateModelHasPermissionsTable;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createModelHasPermissionsTable);
    }

    public function testUp(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
