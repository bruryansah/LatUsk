<?php

namespace App\Filament\Widgets;

use App\Models\Pembelian;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pendapatan';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        // Ambil total pendapatan per bulan (status selesai saja)
        $data = Pembelian::query()
            ->select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('SUM(bayar) as total_pendapatan')
            )
            ->whereYear('created_at', now()->year)
            ->where('status', 'Selesai')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total_pendapatan', 'bulan')
            ->toArray();

        $labels = [];
        $values = [];

        // Loop 12 bulan
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('M', mktime(0, 0, 0, $i, 1));
            $values[] = $data[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan',
                    'data' => $values,
                ],
            ],
            'labels' => $labels,
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
