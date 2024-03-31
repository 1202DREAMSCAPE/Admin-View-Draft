<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    /**
     * The resource model.
     */
    protected static string $resource = UserResource::class;

    //Alumni Report Title
    protected static ?string $title = 'Alumni Report';

    //Add more to the record
   /* protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }*/
}
