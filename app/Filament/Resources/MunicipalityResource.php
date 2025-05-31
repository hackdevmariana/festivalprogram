<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MunicipalityResource\Pages;
use App\Models\Municipality;
use App\Models\Province;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class MunicipalityResource extends Resource
{
    protected static ?string $model = Municipality::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Location';


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Select::make('province_id')
                ->label('Province')
                ->options(Province::pluck('name', 'id'))
                ->required(),

            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(Municipality::class),

            TextInput::make('latitude')
                ->numeric()
                ->step(0.00000001)
                ->placeholder('Enter latitude'),

            TextInput::make('longitude')
                ->numeric()
                ->step(0.00000001)
                ->placeholder('Enter longitude'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('slug')->sortable()->searchable(),
            TextColumn::make('province.name')->label('Province')->sortable(),
            TextColumn::make('latitude')->sortable(),
            TextColumn::make('longitude')->sortable(),
            TextColumn::make('created_at')->dateTime(),
        ])
        ->filters([
            SelectFilter::make('province_id')
                ->label('Province')
                ->options(Province::pluck('name', 'id')),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMunicipalities::route('/'),
            'create' => Pages\CreateMunicipality::route('/create'),
            'edit' => Pages\EditMunicipality::route('/{record}/edit'),
        ];
    }
}
