<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Panel;


class UserResource extends Resource
{
    /**
     * The resource model.
     */
    protected static ?string $model = User::class;

    /**
     * The resource navigation icon.
     */
    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $label = 'Alumni Record';
    


    /**
     * The settings navigation group.
     */
    //protected static ?string $navigationGroup = 'Collections';

    /**
     * The settings navigation sort order.
     */
    protected static ?int $navigationSort = 2;

    /**
     * Get the navigation badge for the resource.
     */
    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    /**
     * The resource form.
     */

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('Phone')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->password()
                    ->confirmed()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Confirm password')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->maxLength(255),
            ]);
    }

    /**
     * The resource table.
     */
    public static function table(Table $table): Table
    {
        return $table
            
            ->columns([
                Tables\Columns\TextColumn::make('Student Number')
                    ->searchable()
                    ->label('Student Number')
                    ->alignCenter(),
                    //->sortable(),

                Tables\Columns\TextColumn::make('Student')
                    ->searchable()
                    ->label('Last Name')
                    ->alignCenter(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('First Name')
                    ->alignCenter(),
                
                Tables\Columns\TextColumn::make('name2')
                    ->searchable()
                    ->label('Middle Name')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->alignCenter(),
                    
                //Tables\Columns\TextColumn::make('created_at')
                  //  ->dateTime()
                    //->sortable(),

                Tables\Columns\TextColumn::make('phone')
                ->label('Contact Number')
                ->alignCenter(),

                Tables\Columns\TextColumn::make('Course')
                ->alignCenter(),
            ])

            ->filters([
                    Filter::make('name')->label('Admin'),
                    Filter::make('course')->label('College'),
                    Filter::make('gender')->label('Female'),
                    Filter::make('gender')->label('Male')
                     //here pwede mag add ng filter, add tag nalang for users
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    //Tables\Actions\Action::make('print'),
                    Tables\Actions\Action::make('export')->action(function ($selectedRecords) {
                        // Assuming you have a route named 'generate.pdf' that is handled by GeneratePdfController
                        return redirect()->route('generate-pdf', ['selectedRecords' => $selectedRecords]);
                    }),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    /**
     * The resource relation managers.
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * The resource pages.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
        ];
    }
}
