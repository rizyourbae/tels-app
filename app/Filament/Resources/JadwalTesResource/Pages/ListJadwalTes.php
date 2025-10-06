<?php

namespace App\Filament\Resources\JadwalTesResource\Pages;

use App\Filament\Resources\JadwalTesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalTes extends ListRecords
{
    protected static string $resource = JadwalTesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
