<?php

namespace App\Filament\Widgets;

use App\Models\Pembelian;
use Filament\Widgets\ChartWidget;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pendapatan (dummy)';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'note' => '',
                    'data' => [
                        100000,
                        250000,
                        150000,
                        300000,
                        200000,
                        400000,
                    ],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public static function canView(): bool
    {
        return auth()->user()?->role === 'Admin';
    }
}
