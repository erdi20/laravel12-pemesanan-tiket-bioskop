<?php

namespace App\Filament\Resources\StudioResource\Pages;

use App\Filament\Resources\StudioResource;
use Filament\Resources\Pages\ManageRecords;
use Filament\Actions;

class ManageStudios extends ManageRecords
{
    protected static string $resource = StudioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->after(function ($record) {
                    $rowCount = $record->row_count;
                    $columnCount = $record->column_count;

                    for ($row = 1; $row <= $rowCount; $row++) {
                        $rowLetter = chr(64 + $row);
                        for ($col = 1; $col <= $columnCount; $col++) {
                            $record->seats()->create([
                                'seat_row' => $rowLetter,
                                'seat_number' => $col,
                            ]);
                        }
                    }

                    $record->total_seats = $rowCount * $columnCount;
                    $record->save();
                }),
        ];
    }
}
