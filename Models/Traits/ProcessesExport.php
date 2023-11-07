<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Modules\User\Models\Jobs\CreatePersonalDataExportJob;
use Spatie\PersonalDataExport\ExportsPersonalData;

/**
 * Undocumented trait.
 *
 * @property ?Batch $exportBatch
 */
trait ProcessesExport
{
    public ?int $exportBatchId = null;

    public int $exportProgress = 0;

    /**
     * @throws \Throwable
     */
    public function export(): void
    {
        if (! $this->user instanceof ExportsPersonalData) {
            throw new \Exception('user must implemtents Spatie\PersonalDataExport\ExportsPersonalData');
        }

        $batch = Bus::batch(new CreatePersonalDataExportJob($this->user))
            ->name('export personal data')
            ->allowFailures()
            ->dispatch();

        $batch_id = (int) $batch->id;

        $this->exportBatchId = $batch_id;
    }

    public function getExportBatchProperty(): ?Batch
    {
        if (! $this->exportBatchId) {
            return null;
        }

        return Bus::findBatch((string) $this->exportBatchId);
    }

    public function updateExportProgress(): void
    {
        if ($this->exportBatch !== null) {
            $this->exportProgress = $this->exportBatch->progress();
        }
    }
}
