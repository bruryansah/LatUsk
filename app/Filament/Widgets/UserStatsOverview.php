<?php

namespace App\Filament\Widgets;

use App\Models\Pembelian;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class UserStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();

        return [
            Stat::make('Total Barang Dibeli', $totalBarang = Pembelian::where('user_id', $user->id)->sum('banyak'))
                ->description('Jumlah barang yang pernah dibeli')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),

            Stat::make(
                'Total Transaksi',
                Pembelian::where('user_id', $user->id)->count()
            )
                ->color('success'),

            Stat::make(
                'Total Pembayaran',
                'Rp ' . number_format(
                    Pembelian::where('user_id', $user->id)->sum('bayar'),
                    0,
                    ',',
                    '.'
                )
            )
                ->color('warning'),
        ];
    }

        public static function canView(): bool
        {
        return auth()->user()?->role === 'Guest';
        }
}
