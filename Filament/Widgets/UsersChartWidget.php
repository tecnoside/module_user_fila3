<?php

declare(strict_types=1);
/**
 * @see
 */

namespace Modules\User\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Carbon;
use Modules\User\Models\AuthenticationLog;

class UsersChartWidget extends ChartWidget implements HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;
    use InteractsWithPageFilters;

    protected static ?string $pollingInterval = null;

    protected static ?int $sort = 2;

    public string $chart_id = '';

    public function getHeading(): Htmlable|string|null
    {
        // return 'chart_id:'.$this->chart_id;
        return 'Authentication Log';
    }

    protected function getType(): string
    {
        // return 'bar';
        return 'line';
    }

    public function testAction(): Action
    {
        return Action::make('test')
            ->requiresConfirmation()
            ->action(function (array $arguments) {
                dd('Test action called', $arguments);
            });
    }

    protected function getData(): array
    {
        $this->mountAction('test', ['id' => 5]);
        $this->testAction();

        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;
        if (! is_string($startDate) || ! is_string($endDate)) {
            return [];
        }
        $format = 'Y-m-d H:i:s';
        // $format = 'Y-m-d';
        // if (! Carbon::hasFormat($startDate, $format) || ! Carbon::hasFormat($endDate, $format)) {
        //    return [];
        // }
        // $startDate = Carbon::parse($startDate);
        $startDate = Carbon::createFromFormat($format, $startDate);
        // $endDate = Carbon::parse($endDate);
        $endDate = Carbon::createFromFormat($format, $endDate);

        $days = $startDate?->diffInDays($endDate) ?? 0;
        if ($days > 365) {
            $startDate = $endDate?->copy()->subDays(365) ?? now();
            // Cannot mutate reactive prop [filters] in component:
            // $this->filters['startDate'] = $endDate->format($format);
        }

        $data = Trend::model(AuthenticationLog::class)
            ->dateColumn('login_at')
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
                    // 'label' => 'Customers '.$this->chart_id,
                    'label' => 'number of login executed',
                    'data' => $chart_data,
                    // 'fill' => 'start',
                ],
            ],
            'labels' => $chart_labels,
        ];
    }
}
