<?php

declare(strict_types=1);
/**
 * @see
 */

namespace Modules\User\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Carbon;


class UsersChartWidget extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $pollingInterval = null;

    protected static ?int $sort = 2;

    public string $chart_id = '';

    public function getHeading(): Htmlable|string|null
    {
        return 'chart_id:'.$this->chart_id;
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        if (is_string($startDate)) {
            $startDate = Carbon::parse($startDate);
        } else {
            $startDate = Carbon::now()->subYears(1);
        }

        $endDate = $this->filters['endDate'] ?? null;
        if (is_string($endDate)) {
            $endDate = Carbon::parse($endDate);
        } else {
            $endDate = Carbon::now();
        }

        $data = Trend::model(\Modules\Xot\Datas\XotData::make()->getUserClass())
            ->between(
                start: $startDate,
                end: $endDate,
            )
            ->perDay()
            ->count();

        /**
         * @var callable
         */
        $data_callable = fn (TrendValue $value) => $value->aggregate;
        /**
         * @var callable
         */
        $labels_callable = fn (TrendValue $value) => $value->date;

        $chart_data = $data->map($data_callable);
        $chart_labels = $data->map($labels_callable);

        return [
            'datasets' => [
                [
                    'label' => 'Customers '.$this->chart_id,
                    'data' => $chart_data,
                    'fill' => 'start',
                ],
            ],
            'labels' => $chart_labels,
        ];
    }
}
