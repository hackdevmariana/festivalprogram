<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventGroupResource\Pages;
use App\Models\EventGroup;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;

class EventGroupResource extends Resource
{
    protected static ?string $model = EventGroup::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Eventos'; 

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('slug')->disabled(),
            Textarea::make('description'),
            TextInput::make('url')->url()->nullable(),
            FileUpload::make('poster')
                ->image()
                ->directory('posters')
                ->nullable(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('slug')->sortable()->searchable(),
            TextColumn::make('url')->sortable(),
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
            'index' => Pages\ListEventGroups::route('/'),
            'create' => Pages\CreateEventGroup::route('/create'),
            'edit' => Pages\EditEventGroup::route('/{record}/edit'),
        ];
    }
}
