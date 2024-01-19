<?php

namespace Modules\User\Tests\Unit\Models\Traits;

use Modules\User\Models\Traits\ProcessesExport;
use Tests\TestCase;

/**
 * Class ProcessesExportTest.
 *
 * @covers \Modules\User\Models\Traits\ProcessesExport
 */
final class ProcessesExportTest extends TestCase
{
    private ProcessesExport $processesExport;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->processesExport = $this->getMockBuilder(ProcessesExport::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->processesExport);
    }

    public function testExport(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetExportBatchProperty(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUpdateExportProgress(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
