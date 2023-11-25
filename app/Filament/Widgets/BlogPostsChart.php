<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Boarders;
use Filament\Support\RawJs;

class BlogPostsChart extends ChartWidget
{
    protected static string $color = 'info';

    protected function getData(): array
    {

        $data = Trend::model(Boarders::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Boarders',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
    // protected function getOptions(): array
    // {
    //     return [
    //         'plugins' => [
    //             'legend' => [
    //                 'display' => false, //return a dynamic array of options
    //             ],
    //         ],
    //     ];
    // }
    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
            {
                scales: {
                    y: {
                        ticks: {
                            callback: (value) => '€' + value,
                        },
                    },
                },
            }
        JS);
    }
    public function getDescription(): ?string
    {
        return 'The number of blog posts published per month.';
    }
    protected static bool $isLazy = true;
}
