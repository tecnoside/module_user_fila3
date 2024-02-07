<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Database\Factories;

use Modules\User\Database\Factories\ModelHasPermissionFactory;
use Tests\TestCase;

/**
 * Class ModelHasPermissionFactoryTest.
 *
 * @covers \Modules\User\Database\Factories\ModelHasPermissionFactory
 */
final class ModelHasPermissionFactoryTest extends TestCase
{
    private ModelHasPermissionFactory $modelHasPermissionFactory;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->modelHasPermissionFactory = new ModelHasPermissionFactory;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->modelHasPermissionFactory);
    }

    public function testDefinition(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
