<?php

namespace App\Filament\Resources\AlumniReportResource\Pages;

use App\Filament\Resources\AlumniReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumniReport extends EditRecord
{
    protected static string $resource = AlumniReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
