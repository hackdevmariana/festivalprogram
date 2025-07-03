<?php

namespace App\Filament\Resources\VenueResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';
    protected static ?string $title = 'Imágenes';
    protected static ?string $recordTitleAttribute = 'caption';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('path')
                ->image()
                ->disk('public')
                ->directory('venues/images')
                ->label('Imagen'),

            Forms\Components\TextInput::make('type')->label('Tipo'),
            Forms\Components\TextInput::make('caption')->label('Pie de foto')->maxLength(255),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('path')->label('Imagen'),
                Tables\Columns\TextColumn::make('type')->label('Tipo'),
                Tables\Columns\TextColumn::make('caption')->label('Pie'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Creado'),
            ])
            ->headerActions([CreateAction::make()])
            ->actions([EditAction::make()]);
    }
}
