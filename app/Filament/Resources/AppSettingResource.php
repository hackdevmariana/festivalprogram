<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppSettingResource\Pages;
use App\Models\AppSetting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;

class AppSettingResource extends Resource
{
    protected static ?string $model = AppSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('logo')
                    ->image()
                    ->directory('logo')
                    ->nullable()
                    ->label('Logotipo de la aplicación'),

                TextInput::make('slogan')
                    ->maxLength(255),

                TextInput::make('domain')
                    ->required()
                    ->maxLength(255),

                Select::make('copy_type')
                    ->options([
                        'copyright' => 'Copyright',
                        'copyleft' => 'Copyleft',
                    ])
                    ->required(),

                TextInput::make('developed_by')
                    ->required()
                    ->maxLength(255)
                    ->nullable(),

                TextInput::make('developed_url')
                    ->url()
                    ->maxLength(255)
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('slogan')->limit(50),
                TextColumn::make('domain')->sortable(),
                TextColumn::make('copy_type')->sortable(),
                TextColumn::make('developed_by'),
                ImageColumn::make('logo')->disk('public')->label('Logo'),
            ])
            ->filters([
                // Filtros, si es necesario
            ])
            ->actions([
                // Acciones personalizadas (Editar, Eliminar)
            ])
            ->bulkActions([
                // Acciones masivas (si es necesario)
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppSettings::route('/'),
            'create' => Pages\CreateAppSetting::route('/create'),
            'edit' => Pages\EditAppSetting::route('/{record}/edit'),
        ];
    }
}
