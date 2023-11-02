<?php

declare(strict_types=1);

namespace Modules\User\Traits;

use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Modules\User\Jobs\CreatePersonalDataExportJob;

trait ProcessesExport
{
    /**
     * @var int<min, -1>|int<1, max>|string
     */
    public $exportBatchId;

    /**
     * @var int
     */
    public $exportProgress = 0;

    /**
     * @throws \Throwable
     */
    public function export(): void
    {
        $batch = Bus::batch(new CreatePersonalDataExportJob($this->user))
            ->name('export personal data')
            ->allowFailures()
            ->dispatch();

        $this->exportBatchId = $batch->id;
    }

    public function getExportBatchProperty(): ?Batch
    {
        if (! $this->exportBatchId) {
            return null;
        }

        return Bus::findBatch($this->exportBatchId);
    }

    public function updateExportProgress(): void
    {
        $this->exportProgress = $this->exportBatch->progress();
    }
}
