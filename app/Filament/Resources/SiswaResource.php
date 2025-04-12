<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Kelas;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('nis')
                ->required()
                ->unique(ignoreRecord: true)
                ->label('NIS'),
            TextInput::make('nama')
                ->required()
                ->label('Nama Siswa'),
            Select::make('kelas_id')
                ->label('Kelas')
                ->required()
                ->options(Kelas::all()->pluck('Kelas', 'id'))
                ->searchable(),
            TextInput::make('nomor_absen')
                ->required()
                ->numeric()
                ->label('Nomor Absen'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nis')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('nama')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('kelas.Kelas')
                ->label('Kelas')
                ->sortable(),
            Tables\Columns\TextColumn::make('nomor_absen')
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
