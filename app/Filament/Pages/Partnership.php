<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Partnership extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.partnership';
}
