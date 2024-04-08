<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Events extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?int $navigationSort = 6;


    protected static string $view = 'filament.pages.events';
    
}
