<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenueResource\Pages;
use App\Models\Municipality;
use App\Models\Venue;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;

class VenueResource extends Resource
{
    protected static ?string $model = Venue::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Location';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('slug')->disabled(),
            Textarea::make('description'),
            TextInput::make('address')->maxLength(255),
            Select::make('municipality_id')
                ->label('Municipio')
                ->options(Municipality::pluck('name', 'id'))
                ->required(),
            TextInput::make('url')->url()->nullable(),
            FileUpload::make('logo')
                ->image()
                ->directory('logos')
                ->nullable(),
            TextInput::make('latitude')->numeric()->step(0.0000001),
            TextInput::make('longitude')->numeric()->step(0.0000001),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('slug')->sortable()->searchable(),
            TextColumn::make('municipality.name')->label('Municipio')->sortable(),
            TextColumn::make('latitude')->sortable(),
            TextColumn::make('longitude')->sortable(),
            TextColumn::make('created_at')->dateTime(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVenues::route('/'),
            'create' => Pages\CreateVenue::route('/create'),
            'edit' => Pages\EditVenue::route('/{record}/edit'),
        ];
    }
}
