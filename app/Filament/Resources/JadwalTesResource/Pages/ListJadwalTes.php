<?php

namespace App\Filament\Resources\JadwalTesResource\Pages;

use App\Filament\Resources\JadwalTesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJadwalTes extends ListRecords
{
    protected static string $resource = JadwalTesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Jadwal Tes')
                ->icon('heroicon-o-document-plus'),
        ];
    }
}
