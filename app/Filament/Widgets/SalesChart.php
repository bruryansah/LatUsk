<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Penjualan (dummy)';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Penjualan ',
                    'data' => [10, 25, 30, 15, 40, 50],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public static function canView(): bool
    {
        return auth()->user()?->role === 'Admin';
    }
}
