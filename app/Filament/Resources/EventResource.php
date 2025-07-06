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
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\Action;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Eventos';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make('Información del evento')
                ->schema([
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

                    Select::make('event_mode')
                        ->label('Tipo de evento')
                        ->options([
                            'presential' => 'Presencial',
                            'online' => 'Online',
                            'hybrid' => 'Híbrido',
                        ])
                        ->default('presential')
                        ->required()
                        ->reactive(),

                    // Solo visible si es online o híbrido
                    TextInput::make('online_url')
                        ->label('Enlace del evento (si es online)')
                        ->url()
                        ->nullable()
                        ->visible(fn($get) => in_array($get('event_mode'), ['online', 'hybrid'])),

                    // Solo visible si es presencial o híbrido
                    Select::make('venue_id')
                        ->label('Lugar')
                        ->options(Venue::pluck('name', 'id'))
                        ->nullable()
                        ->visible(fn($get) => in_array($get('event_mode'), ['presential', 'hybrid'])),

                    TextInput::make('url')->url()->label('Web oficial')->nullable(),
                    FileUpload::make('poster')->image()->directory('posters')->nullable(),
                    TextInput::make('price')->numeric()->step(0.01)->nullable(),
                    Select::make('status')
                        ->label('Estado')
                        ->options([
                            'draft' => 'Borrador',
                            'submitted' => 'Enviado',
                            'approved' => 'Aprobado',
                            'rejected' => 'Rechazado',
                            'archived' => 'Archivado',
                        ])
                        ->default('draft')
                        ->required(),

                ])
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('municipality.name')->sortable()->searchable(),
                TextColumn::make('start_datetime')->sortable(),
                TextColumn::make('eventGroup.name')->label('Grupo')->sortable()->searchable(),
                TextColumn::make('venue.name')->sortable()->searchable(),
                TextColumn::make('price')->sortable(),
                TextColumn::make('event_mode')->label('Modo')->sortable(),
                TextColumn::make('online_url')
                    ->label('Enlace online')
                    ->url('online_url')
                    ->openUrlInNewTab()
                    ->toggleable()
                    ->limit(30),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->colors([
                        'gray' => 'draft',
                        'warning' => 'submitted',
                        'success' => 'approved',
                        'danger' => 'rejected',
                        'secondary' => 'archived',
                    ])
                    ->sortable(),
            ])
            ->actions([
                Action::make('aprobar')
                    ->label('Aprobar')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn($record) => $record->status !== 'approved')
                    ->action(fn($record) => $record->update(['status' => 'approved'])),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\EventResource\RelationManagers\ImagesRelationManager::class,
        ];
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
