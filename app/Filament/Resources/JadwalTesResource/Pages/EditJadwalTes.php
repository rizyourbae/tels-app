<?php

namespace App\Filament\Resources\JadwalTesResource\Pages;

use App\Filament\Resources\JadwalTesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalTes extends EditRecord
{
    protected static string $resource = JadwalTesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
