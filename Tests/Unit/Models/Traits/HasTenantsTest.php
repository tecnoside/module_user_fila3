<?php

namespace Modules\User\Tests\Unit\Models\Traits;

use Modules\User\Models\Traits\HasTenants;
use Tests\TestCase;

/**
 * Class HasTenantsTest.
 *
 * @covers \Modules\User\Models\Traits\HasTenants
 */
final class HasTenantsTest extends TestCase
{
    private HasTenants $hasTenants;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->hasTenants = $this->getMockBuilder(HasTenants::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->hasTenants);
    }

    public function testCanAccessTenant(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetTenants(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTenants(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
