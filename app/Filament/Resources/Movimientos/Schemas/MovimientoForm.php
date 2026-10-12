<?php

namespace App\Filament\Resources\Movimientos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use App\Models\User;
use App\Models\Categoria;
use Filament\Schemas\Components\Section;

class MovimientoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Llene los campos del formulario')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                    Select::make('user_id')
                        ->label('Usuario')
                        ->required()
                        ->options(User::all()->pluck('name', 'id')),
                    Select::make('categoria_id')
                        ->label('Categoría')
                        ->required()
                        ->options(Categoria::all()->pluck('nombre', 'id')),
                    Select::make('tipo')
                        ->options(['ingreso' => 'Ingreso', 'egreso' => 'Egreso'])
                        ->required(),
                    TextInput::make('monto')
                        ->label('Monto')
                        ->required()
                        ->numeric(),
                    RichEditor::make('descripcion')
                        ->label('Descripción')
                        ->required()
                        ->columnSpanFull(),
                    FileUpload::make('foto')
                        ->label('Foto')
                        ->image()
                        ->disk('public')
                        ->directory('movimientos'),
                    DatePicker::make('fecha')
                        ->required(),
                ]),
            ]);
    }
}
