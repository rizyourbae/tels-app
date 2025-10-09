<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use App\Models\JadwalTes;
use App\Models\User;
use App\Enums\PendaftaranStatus;
use Filament\Forms\Components\{Section, Select, TextInput, Wizard\Step, Wizard, Placeholder};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'jadwalTes']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Detail Pendaftaran')
                        ->icon('heroicon-o-user-group')
                        ->schema([
                            Select::make('user_id')
                                ->label('Mahasiswa')
                                ->relationship('user', 'name')
                                ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->name} - {$record->nim}")
                                ->searchable(['name', 'nim'])
                                ->preload()
                                ->required()
                                ->disabledOn('edit'),
                            Select::make('jadwal_tes_id')
                                ->label('Jadwal Tes')
                                ->options(JadwalTes::all()->mapWithKeys(function ($jadwal) {
                                    $tanggal = \Carbon\Carbon::parse($jadwal->tanggal_tes)->translatedFormat('d F Y');
                                    $waktu = \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i');
                                    return [$jadwal->id => "{$tanggal} | {$waktu} | {$jadwal->lokasi}"];
                                }))
                                ->searchable()
                                ->required()
                                ->disabledOn('edit'),
                        ])->columns(2),

                    Step::make('Input Skor')
                        ->icon('heroicon-o-pencil-square')
                        ->visibleOn('edit') // Step ini hanya muncul saat edit
                        ->schema([
                            TextInput::make('jawaban_benar_listening')
                                ->label('Jawaban Benar Listening (0-50)')
                                ->prefixIcon('heroicon-o-speaker-wave')
                                ->numeric()->minValue(0)->maxValue(50),
                            TextInput::make('jawaban_benar_structure')
                                ->label('Jawaban Benar Structure (0-40)')
                                ->prefixIcon('heroicon-o-queue-list')
                                ->numeric()->minValue(0)->maxValue(40),
                            TextInput::make('jawaban_benar_reading')
                                ->label('Jawaban Benar Reading (0-50)')
                                ->prefixIcon('heroicon-o-book-open')
                                ->numeric()->minValue(0)->maxValue(50),
                        ])->columns(3),

                    Step::make('Hasil Akhir')
                        ->icon('heroicon-o-check-badge')
                        ->visibleOn('edit') // Step ini hanya muncul saat edit
                        ->schema([
                            Placeholder::make('info_hasil')
                                ->label('Hasil Perhitungan Skor')
                                ->content('Skor di bawah ini dihasilkan secara otomatis setelah Anda menyimpan perubahan dari langkah sebelumnya.'),
                            TextInput::make('skor_listening')->label('Skor Listening')->disabled(),
                            TextInput::make('skor_structure')->label('Skor Structure')->disabled(),
                            TextInput::make('skor_reading')->label('Skor Reading')->disabled(),
                            TextInput::make('skor_total')->label('Skor Total')->disabled(),
                            Placeholder::make('status_hasil')
                                ->label('Status Akhir')
                                ->content(fn($record) => $record?->status->value ?? '-'),
                        ])->columns(4),
                ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Mahasiswa')
                    ->description(fn($record): string => "NIM: {$record->user->nim} | Prodi: {$record->user->program_studi}")
                    ->searchable(['name', 'nim', 'program_studi']),

                TextColumn::make('jadwalTes.tanggal_tes')
                    ->label('Jadwal Tes')
                    ->date('d F Y')
                    ->icon('heroicon-o-calendar-days')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->icon(fn(PendaftaranStatus $state): string => match ($state) {
                        PendaftaranStatus::TERDAFTAR => 'heroicon-o-clock',
                        PendaftaranStatus::SELESAI => 'heroicon-o-check-circle',
                    })
                    ->color(fn(PendaftaranStatus $state): string => match ($state) {
                        PendaftaranStatus::TERDAFTAR => 'warning',
                        PendaftaranStatus::SELESAI => 'success',
                    }),

                TextColumn::make('skor_total')
                    ->label('Skor')
                    ->icon('heroicon-o-star')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tgl. Daftar')
                    ->since() // Format relative seperti "2 days ago"
                    ->sortable(),
            ])
            ->filters([
                // Filter berdasarkan Status
                SelectFilter::make('status')
                    ->options(PendaftaranStatus::class),

                // Filter berdasarkan Jadwal Tes
                SelectFilter::make('jadwal_tes_id')
                    ->label('Jadwal Tes')
                    ->relationship('jadwalTes', 'tanggal_tes')
                    ->searchable()
                    ->preload(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
