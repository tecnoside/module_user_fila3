<?php

declare(strict_types=1);

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

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->userDatabaseSeeder = new UserDatabaseSeeder;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userDatabaseSeeder);
    }

    public function testRun(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
