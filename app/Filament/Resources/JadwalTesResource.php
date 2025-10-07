<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalTesResource\Pages;
use App\Models\JadwalTes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\{DatePicker, TextInput};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;

class JadwalTesResource extends Resource
{
    protected static ?string $model = JadwalTes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal_tes')
                    ->label('Tanggal Ujian')
                    ->required(),
                TextInput::make('waktu_mulai')
                    ->label('Waktu Mulai')
                    ->required(),
                TextInput::make('lokasi')
                    ->label('Lokasi Tes')
                    ->required()
                    ->maxLength(255),
                TextInput::make('kuota')
                    ->label('Kuota Peserta')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_tes')
                    ->label('Tanggal Ujian')
                    ->date()
                    ->sortable(),
                TextColumn::make('waktu_mulai')
                    ->label('Waktu Mulai'),
                TextColumn::make('lokasi')
                    ->searchable(),
                TextColumn::make('kuota')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
