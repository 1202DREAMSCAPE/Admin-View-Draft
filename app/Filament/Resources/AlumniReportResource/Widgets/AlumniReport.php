<?php

namespace App\Filament\Resources\AlumniReportResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\Action;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class AlumniReport extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Alumni Name'),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('phone'),
                TextColumn::make('address'),
            ])
            ->filters([
                Filter::make('name')->label('Admin hehe'),
                Filter::make('course')->label('College'),
                Filter::make('gender')->label('Female')
            ])
            ->actions([
                // Uncomment and adjust as needed
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    Action::make('print'),
                    Action::make('export')->action(function ($selectedRecords) {
                        // Assuming you have a route named 'generate.pdf' that is handled by GeneratePdfController
                        return redirect()->route('generate-pdf', ['selectedRecords' => $selectedRecords]);
                    }),
                ]),
            ])
            ->emptyStateActions([
                Action::make('create')->action(function () {
                    // Define the action for creating a new record
                }),
            ]);
    }

}
