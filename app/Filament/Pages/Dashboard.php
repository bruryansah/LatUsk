<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected string $view = 'filament.pages.dashboard';

    protected function getColumns(): int
    {
        return 2; // jumlah kolom dashboard
    }

    protected function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\SalesChart::class,
            \App\Filament\Widgets\RevenueChart::class,
        ];
    }
}
