<?php

namespace App\Filament\Resources\AlumniReportResource\Pages;

use App\Filament\Resources\AlumniReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumniReports extends ListRecords
{
    protected static string $resource = AlumniReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
