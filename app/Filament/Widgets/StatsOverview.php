<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Layanan', \App\Models\Service::count())
                ->description('Layanan aktif')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary'),
            Stat::make('Total Portfolio', \App\Models\Portfolio::count())
                ->description('Proyek terselesaikan')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
            Stat::make('Total Artikel', \App\Models\Blog::count())
                ->description('Artikel & Berita')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
            Stat::make('Pesan Masuk', \App\Models\Inquiry::count())
                ->description('Pesan dari kontak')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}
