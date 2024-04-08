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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ExportBulkAction;

class AlumniReport extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                Tables\Columns\TextColumn::make('SNum')
                    ->searchable()
                    ->label('Student Number'),
                    //->sortable(),

                Tables\Columns\TextColumn::make('LName')
                    ->searchable()
                    ->label('Last Name'),
                    
                Tables\Columns\TextColumn::make('FName')
                    ->searchable()
                    ->label('First Name')
                    ->alignCenter(),
                
                Tables\Columns\TextColumn::make('MNname')
                    ->searchable()
                    ->label('Middle Name')
                    ->alignCenter(),

               /* Tables\Columns\TextColumn::make('EmailAdd')
                    ->searchable()
                    ->alignCenter(),*/
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->alignCenter(),
                    
                //Tables\Columns\TextColumn::make('created_at')
                  //  ->dateTime()
                    //->sortable(),

                Tables\Columns\TextColumn::make('ContactNum')
                ->label('Contact Number')
                ->alignCenter(),

                Tables\Columns\TextColumn::make('Course')
                ->alignCenter(),
            ])

            ->filters([
                    Filter::make('name')->label('Admin'),
                    
                    SelectFilter::make('Gender')->options([
                    'male' => 'Male',
                    'female' => 'Female',
                    'not specified' => 'Not Specified',
                ]),

                    SelectFilter::make('College')->options([
                    'Bachelor of Science in Computer Science',
                ]),
            ])
            ->actions([
                // Uncomment and adjust as needed
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->emptyStateActions([
                Action::make('create')->action(function () {
                    // Define the action for creating a new record
                }),
            ]);
    }

}
