<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistResource\Pages;
use App\Filament\Resources\ArtistResource\RelationManagers;
use App\Models\Artist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtistResource extends Resource
{
    protected static ?string $model = Artist::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Artistas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nombre')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->maxLength(255)
                ->disabled(), // El slug se genera automáticamente

            Forms\Components\Textarea::make('bio')
                ->label('Biografía')
                ->required(),

            Forms\Components\FileUpload::make('photo')
                ->label('Foto')
                ->nullable()
                ->image()
                ->disk('public')
                ->directory('artists/photos')
                ->maxSize(2048), // Tamaño máximo de 2 MB


            Forms\Components\Repeater::make('images')
                ->relationship('images')
                ->label('Imágenes')
                ->schema([
                    Forms\Components\FileUpload::make('path')
                        ->label('Imagen')
                        ->image()
                        ->disk('public')
                        ->directory('artists/images'),
                    Forms\Components\TextInput::make('type')->label('Tipo'),
                    Forms\Components\TextInput::make('caption')->label('Pie/Descripción'),
                ])
                ->addActionLabel('Añadir imagen')
                ->columnSpan('full'),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->label('Nombre'),
            Tables\Columns\TextColumn::make('slug')->label('Slug'),
            Tables\Columns\TextColumn::make('created_at')->label('Creado')->date(),
            Tables\Columns\TextColumn::make('updated_at')->label('Actualizado')->date(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtists::route('/'),
            'create' => Pages\CreateArtist::route('/create'),
            'edit' => Pages\EditArtist::route('/{record}/edit'),
        ];
    }
}
