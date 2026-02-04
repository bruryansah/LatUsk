<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panels\PanelsRenderHook;
use Filament\View\PanelsRenderHook as ViewPanelsRenderHook;
use Illuminate\Support\HtmlString;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Halaman Utama') // Nama menu
                    ->url(route('homeproduk')) // Route yang dituju
                    ->icon('heroicon-o-link')
                    ->group('shop') // Grup untuk menu
                    ->sort(100),

            ]);
        });

        Filament::registerRenderHook(
            ViewPanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn () : HtmlString => new HtmlString(
                '<div class="my-6 text-center">
                    <a href="/" class="text-sm text-gray-600 hover:underline"> <- Kembali ke home</a>
                </div>'
            )
        );
    }
}
