<?php

namespace Modules\User\Tests\Unit\Database\Seeders;

use Modules\User\Database\Seeders\RolesSeeder;
use Tests\TestCase;

/**
 * Class RolesSeederTest.
 *
 * @covers \Modules\User\Database\Seeders\RolesSeeder
 */
final class RolesSeederTest extends TestCase
{
    private RolesSeeder $rolesSeeder;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->rolesSeeder = new RolesSeeder();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->rolesSeeder);
    }

    public function testRun(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
