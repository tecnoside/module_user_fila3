<?php

namespace Modules\User\Tests\Unit\Models\Traits;

use Modules\User\Models\Traits\UuidTrait;
use Tests\TestCase;

/**
 * Class UuidTraitTest.
 *
 * @covers \Modules\User\Models\Traits\UuidTrait
 */
final class UuidTraitTest extends TestCase
{
    private UuidTrait $uuidTrait;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->uuidTrait = $this->getMockBuilder(UuidTrait::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->uuidTrait);
    }

    public function testBootUuidTrait(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetIncrementing(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetKeyType(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
