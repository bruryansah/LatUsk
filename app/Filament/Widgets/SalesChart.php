<?php

namespace App\Filament\Widgets;

use App\Models\Pembelian;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Penjualan';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        $rawData = Pembelian::query()
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as bulan'),
                DB::raw('SUM(banyak) as total_penjualan')
            )
            ->where('status', 'Selesai')
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total_penjualan', 'bulan')
            ->toArray();

        $labels = [];
        $values = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $key = $date->format('Y-m');

            $labels[] = $date->format('M Y');
            $values[] = $rawData[$key] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Unit Terjual',
                    'data' => $values,
                ],
            ],
            'labels' => $labels,
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
