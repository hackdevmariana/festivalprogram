<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use App\Models\Municipality;
use App\Models\Venue;
use App\Models\EventGroup;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('title')->required()->maxLength(255),
            TextInput::make('slug')->disabled(),
            Textarea::make('description'),
            Select::make('municipality_id')
                ->label('Municipio')
                ->options(Municipality::pluck('name', 'id'))
                ->required(),
            Select::make('event_group_id')
                ->label('Grupo de eventos')
                ->options(EventGroup::pluck('name', 'id'))
                ->nullable(),
            DatePicker::make('start_datetime')->required(),
            DatePicker::make('end_date')->nullable(),
            TextInput::make('url')->url()->nullable(),
            FileUpload::make('poster')->image()->directory('posters')->nullable(),
            Select::make('venue_id')
                ->label('Lugar')
                ->options(Venue::pluck('name', 'id'))
                ->nullable(),
            TextInput::make('price')->numeric()->step(0.01)->nullable(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('title')->sortable()->searchable(),
            TextColumn::make('municipality.name')->sortable()->searchable(),
            TextColumn::make('start_datetime')->sortable(),
            TextColumn::make('eventGroup.name')->label('Grupo')->sortable()->searchable(),
            TextColumn::make('venue.name')->sortable()->searchable(),
            TextColumn::make('price')->sortable(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
