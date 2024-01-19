<?php

namespace Tests\Unit;

use CreatePasswordResetsTable;
use Tests\TestCase;

/**
 * Class CreatePasswordResetsTableTest.
 *
 * @covers \CreatePasswordResetsTable
 */
final class CreatePasswordResetsTableTest extends TestCase
{
    private CreatePasswordResetsTable $createPasswordResetsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createPasswordResetsTable = new CreatePasswordResetsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createPasswordResetsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
