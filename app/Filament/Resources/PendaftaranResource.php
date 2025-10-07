<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use App\Enums\PendaftaranStatus;
use Filament\Forms\Components\{Section, Select, TextInput};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Pendaftaran')
                    ->schema([
                        Select::make('user_id')
                            ->label('Mahasiswa')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->disabledOn('edit'),
                        Select::make('jadwal_tes_id')
                            ->label('Jadwal Tes')
                            ->relationship('jadwalTes', 'tanggal_tes')
                            ->required()
                            ->disabledOn('edit'),
                    ])->columns(2),

                Section::make('Input Skor (Jumlah Jawaban Benar)')
                    ->description('Isi jumlah jawaban benar di sini. Skor resmi akan dihitung otomatis.')
                    ->schema([
                        TextInput::make('jawaban_benar_listening')
                            ->label('Listening (0-50)')
                            ->numeric()->minValue(0)->maxValue(50),
                        TextInput::make('jawaban_benar_structure')
                            ->label('Structure (0-40)')
                            ->numeric()->minValue(0)->maxValue(40),
                        TextInput::make('jawaban_benar_reading')
                            ->label('Reading (0-50)')
                            ->numeric()->minValue(0)->maxValue(50),
                    ])->columns(3)->hiddenOn('create'),

                Section::make('Hasil Skor Resmi (Otomatis)')
                    ->schema([
                        TextInput::make('skor_listening')
                            ->disabled(),
                        TextInput::make('skor_structure')
                            ->disabled(),
                        TextInput::make('skor_reading')
                            ->disabled(),
                        TextInput::make('skor_total')
                            ->label('Skor Total')
                            ->disabled(),
                        Select::make('status')
                            ->disabled(),
                    ])->columns(5)->hiddenOn('create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jadwalTes.tanggal_tes')
                    ->label('Tanggal Tes')
                    ->date()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    // 1. Ubah type-hint dari string menjadi PendaftaranStatus
                    ->color(fn(PendaftaranStatus $state): string => match ($state) {
                        // 2. Bandingkan dengan kasus Enum, bukan string
                        PendaftaranStatus::TERDAFTAR => 'warning',
                        PendaftaranStatus::SELESAI => 'success',
                    }),
                TextColumn::make('skor_total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
