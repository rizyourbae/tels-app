<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalTesResource\Pages;
use App\Models\JadwalTes;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\{DatePicker, TextInput, Grid, Section, TimePicker};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class JadwalTesResource extends Resource
{
    protected static ?string $model = JadwalTes::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withCount('pendaftarans');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Jadwal Ujian')
                    ->description('Atur tanggal, waktu, dan detail lainnya untuk sesi ujian TELS.')
                    ->schema([
                        Grid::make(2) // Membuat layout 2 kolom
                            ->schema([
                                DatePicker::make('tanggal_tes')
                                    ->label('Tanggal Ujian')
                                    ->minDate(now()) // Mencegah memilih tanggal lampau
                                    ->required(),

                                TimePicker::make('waktu_mulai')
                                    ->label('Waktu Mulai')
                                    ->seconds(false) // Menghilangkan input detik
                                    ->required(),
                            ]),

                        TextInput::make('lokasi')
                            ->label('Lokasi Tes')
                            ->prefixIcon('heroicon-o-map-pin') // Menambahkan ikon
                            ->required()
                            ->maxLength(255),

                        TextInput::make('kuota')
                            ->label('Kuota Peserta')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->helperText('Jumlah maksimal mahasiswa yang bisa mendaftar.'),
                    ])
                    ->columns(1), // Atur section ini agar field di dalamnya tetap 1 kolom
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_tes')
                    ->label('Tanggal Ujian')
                    ->date('d F Y') // Format Indonesia
                    ->icon('heroicon-o-calendar-days')
                    ->sortable(),

                TextColumn::make('waktu_mulai')
                    ->label('Waktu')
                    ->time('H:i') // Format 24 jam
                    ->icon('heroicon-o-clock'),

                TextColumn::make('lokasi')
                    ->icon('heroicon-o-map-pin')
                    ->searchable(),

                // Ini adalah kolom Kuota yang sudah di-upgrade
                TextColumn::make('pendaftarans_count')
                    ->label('Peserta Terdaftar')
                    ->formatStateUsing(fn($record): string => "{$record->pendaftarans_count} / {$record->kuota}")
                    ->color(fn($record) => match (true) {
                        $record->pendaftarans_count >= $record->kuota => 'danger',
                        $record->pendaftarans_count >= ($record->kuota * 0.8) => 'warning',
                        default => 'success',
                    })
                    ->icon('heroicon-o-users')
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
            'index' => Pages\ListJadwalTes::route('/'),
            'create' => Pages\CreateJadwalTes::route('/create'),
            'edit' => Pages\EditJadwalTes::route('/{record}/edit'),
        ];
    }
}
