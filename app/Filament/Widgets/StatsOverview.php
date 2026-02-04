<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Pembelian;
use App\Models\Produk;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->description('Jumlah seluruh user')
                ->color('success')
                ->icon('heroicon-o-users'),

            Stat::make('Total Produk', Produk::count())
                ->description('Jumlah semua produk')
                ->color('primary')
                ->icon('heroicon-o-cube'),

            Stat::make('Total Transaksi', Pembelian::count())
                ->description('Jumlah pembelian')
                ->color('warning')
                ->icon('heroicon-o-shopping-cart'),
        ];
    }
    protected function getColumns(): int
    {
        return 3;
    }

    public static function canView(): bool
    {
        return auth()->user()?->role === 'Admin';
    }
}
