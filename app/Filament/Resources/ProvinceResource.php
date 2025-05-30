<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvinceResource\Pages;
use App\Models\Province;
use App\Models\Region;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ProvinceResource extends Resource
{
    protected static ?string $model = Province::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Select::make('region_id')
                ->label('Region')
                ->options(Region::pluck('name', 'id'))
                ->required(),

            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(Province::class),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('slug')->sortable()->searchable(),
            TextColumn::make('region.name')->label('Region')->sortable(),
            TextColumn::make('created_at')->dateTime(),
        ])
        ->filters([
            SelectFilter::make('region_id')
                ->label('Region')
                ->options(Region::pluck('name', 'id')),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProvinces::route('/'),
            'create' => Pages\CreateProvince::route('/create'),
            'edit' => Pages\EditProvince::route('/{record}/edit'),
        ];
    }
}
