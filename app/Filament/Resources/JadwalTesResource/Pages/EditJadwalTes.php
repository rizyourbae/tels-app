<?php

namespace App\Filament\Resources\JadwalTesResource\Pages;

use App\Filament\Resources\JadwalTesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditJadwalTes extends EditRecord
{
    protected static string $resource = JadwalTesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Berhasil Merubah Data');
    }
}
