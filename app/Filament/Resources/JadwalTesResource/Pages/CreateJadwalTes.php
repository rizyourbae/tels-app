<?php

namespace App\Filament\Resources\JadwalTesResource\Pages;

use App\Filament\Resources\JadwalTesResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateJadwalTes extends CreateRecord
{
    protected static string $resource = JadwalTesResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Sukses')
            ->body('Berhasil Menambahkan Data Terbaru');
    }
    protected static ?string $title = 'Tambah Jadwal Tes';
}
