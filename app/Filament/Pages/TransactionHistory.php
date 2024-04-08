<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class TransactionHistory extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?int $navigationSort = 8;


    protected static string $view = 'filament.pages.transaction-history';
}
