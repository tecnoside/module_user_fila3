<?php

namespace Tests\Unit\Modules\User\Models;

use Modules\User\Models\Role;
use Tests\TestCase;

/**
 * Class RoleTest.
 *
 * @covers \Modules\User\Models\Role
 */
final class RoleTest extends TestCase
{
    private Role $role;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->role = new Role();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->role);
    }

    public function testTeam(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
