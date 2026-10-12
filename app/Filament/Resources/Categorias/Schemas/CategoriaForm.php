<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {

       return $schema
            ->components([
                Section::make('Llene los campos del formulario')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre de la categoría')
                            ->placeholder('Ingrese el nombre de la categoría')
                            ->required(),

                        Select::make('tipo')
                            ->label('Tipo de movimiento')
                            ->options([
                                'ingreso' => 'Ingreso',
                                'gasto' => 'Gasto',
                            ])
                            ->required(),
                    ]),
            ]);
    }
}
