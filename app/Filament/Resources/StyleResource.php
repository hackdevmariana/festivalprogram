<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StyleResource\Pages;
use App\Models\Style;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class StyleResource extends Resource
{
    protected static ?string $model = Style::class;

    protected static ?string $navigationLabel = 'Estilos';
    protected static ?string $navigationIcon = 'heroicon-o-musical-note';
    protected static ?int $navigationSort = 2;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(Style::class, 'slug'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable(),

            ])
            ->filters([
                // Agregar filtros si es necesario
            ])
            ->actions([
                // Acciones como "ver", "editar", etc.
            ])
            ->bulkActions([
                // Acciones masivas como "eliminar"
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStyles::route('/'),
            'create' => Pages\CreateStyle::route('/create'),
            'edit' => Pages\EditStyle::route('/{record}/edit'),
        ];
    }
}
