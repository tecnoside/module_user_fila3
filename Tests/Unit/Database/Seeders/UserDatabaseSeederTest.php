<?php

namespace Modules\User\Tests\Unit\Database\Seeders;

use Modules\User\Database\Seeders\UserDatabaseSeeder;
use Tests\TestCase;

/**
 * Class UserDatabaseSeederTest.
 *
 * @covers \Modules\User\Database\Seeders\UserDatabaseSeeder
 */
final class UserDatabaseSeederTest extends TestCase
{
    private UserDatabaseSeeder $userDatabaseSeeder;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->userDatabaseSeeder = new UserDatabaseSeeder();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userDatabaseSeeder);
    }

    public function testRun(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
