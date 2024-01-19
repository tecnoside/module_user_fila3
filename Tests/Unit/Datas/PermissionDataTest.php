<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\User\Datas;

use Modules\User\Datas\PermissionData;
use Tests\TestCase;

/**
 * Class PermissionDataTest.
 *
 * @covers \Modules\User\Datas\PermissionData
 */
final class PermissionDataTest extends TestCase
{
    private PermissionData $permissionData;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->permissionData = new PermissionData();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->permissionData);
    }

    public function testMake(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
