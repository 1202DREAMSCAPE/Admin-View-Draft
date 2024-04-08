<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class JobPostingAndOpportunities extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $title = 'Job Posting & Opportunities';
    protected static ?int $navigationSort = 5;

    protected static string $view = 'filament.pages.job-posting-and-opportunities';
}
