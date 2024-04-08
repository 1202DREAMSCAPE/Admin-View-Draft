<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AlumniStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
        //Stat::make('Total Alumni', User::where('role', 'alumni')->count()),
        Stat::make('Alumni', User::count())
            ->description('Total number of alumni in the system')
            ->icon('heroicon-o-users'),
            //->descriptionIcon('heroicon-o-users'),
            //->color('primary')
            //->chart([7, 8, 4, 5, 6, 3, 5, 3]),
        Stat::make('Events','30')
            ->description('Total number of Events in the system')
            ->icon('heroicon-o-calendar-days'),

        Stat::make('Partnerships','30')
            ->color('primary')
            ->icon('heroicon-o-globe-alt')
            ->chart([7, 8, 4, 5, 6, 3, 5, 3]),
        ];
    }
}
