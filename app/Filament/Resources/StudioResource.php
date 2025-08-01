<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Studio;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudioResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudioResource\RelationManagers;

class StudioResource extends Resource
{
    protected static ?string $model = Studio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_seats')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('row_count')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('column_count')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_seats')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('row_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('column_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStudios::route('/'),
        ];
    }

    public static function afterCreate(Model $record): void
    {
        // Mendapatkan data dari model Studio yang baru saja dibuat
        $rowCount = $record->row_count;
        $columnCount = $record->column_count;

        // Iterasi untuk membuat kursi secara otomatis
        for ($row = 1; $row <= $rowCount; $row++) {
            $rowLetter = chr(64 + $row);  // Mengubah angka (1, 2, ...) menjadi huruf ('A', 'B', ...)
            for ($col = 1; $col <= $columnCount; $col++) {
                $record->seats()->create([
                    'seat_row' => $rowLetter,
                    'seat_number' => $col,
                ]);
            }
        }

        // Opsional: Update total_seats setelah semua kursi dibuat
        $record->total_seats = $rowCount * $columnCount;
        $record->save();
    }
}
