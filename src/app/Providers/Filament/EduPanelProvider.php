<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class EduPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('edu')
            ->login()
            ->path('edu')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Edu/Resources'), for: 'App\\Filament\\Edu\\Resources')
            ->discoverPages(in: app_path('Filament/Edu/Pages'), for: 'App\\Filament\\Edu\\Pages')
            ->pages([
                Pages\Dashboard::class,
                \App\Filament\Admin\Pages\EventCoursePage::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Edu/Widgets'), for: 'App\\Filament\\Edu\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->resources([
                \App\Filament\Admin\Resources\ModulResource::class,
                \App\Filament\Admin\Resources\AbsensiSiswaResource::class,
                \App\Filament\Admin\Resources\JawabanTaskResource::class,
                \App\Filament\Admin\Resources\KegiatanResource::class,
                \App\Filament\Admin\Resources\SertifikatResource::class,
                \App\Filament\Admin\Resources\TaskResource::class,
                \App\Filament\Admin\Resources\TeamResource::class,
                \App\Filament\Admin\Resources\EventCourseResource::class,
                \App\Filament\Admin\Resources\MuridResource::class,
            ]);
    }
}
