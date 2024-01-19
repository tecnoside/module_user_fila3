<?php

namespace Modules\User\Tests\Unit\Models\Traits;

use Modules\User\Models\Traits\CanExportPersonalData;
use Tests\TestCase;

/**
 * Class CanExportPersonalDataTest.
 *
 * @covers \Modules\User\Models\Traits\CanExportPersonalData
 */
final class CanExportPersonalDataTest extends TestCase
{
    private CanExportPersonalData $canExportPersonalData;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->canExportPersonalData = $this->getMockBuilder(CanExportPersonalData::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->canExportPersonalData);
    }

    public function testPersonalDataExportName(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSelectPersonalData(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
