<?php

namespace App\Filament\Resources\Movimientos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\FIlters\SelectFilter;
use Filament\Notifications\Notification;

use Filament\Tables\Table;

class MovimientosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->label('Nro.')
                    ->rowIndex(),
                TextColumn::make('user.name')
                    ->label('Usuario')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('categoria.nombre')
                    ->label('Categoría')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tipo')
                    ->label('Tipo de Movimiento')
                    ->sortable()
                    ->searchable()
                    ->badge(),
                TextColumn::make('monto')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('descripcion')
                    ->limit(50)
                    ->html()
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->width(100)
                    ->height(100),
                TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('tipo')
                    ->options([
                        'ingreso' => 'Ingreso',
                        'gasto' => 'Gasto',
                    ])
                    ->placeholder('Seleccionar por tipo')
                    ->label('Tipo'),
            ])
            ->recordActions([
                EditAction::make()
                ->button()
                ->color('success'),
                DeleteAction::make()
                ->button()
                ->color('danger')
                ->successNotification(
                    Notification::make()
                    ->title('Movimiento eliminado')
                    ->body('El movimiento ha sido eliminado correctamente.')
                    ->success()
                ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
