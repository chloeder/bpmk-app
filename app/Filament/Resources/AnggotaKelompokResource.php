<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaKelompokResource\Pages;
use App\Filament\Resources\AnggotaKelompokResource\RelationManagers;
use App\Models\AnggotaKelompok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotaKelompokResource extends Resource
{
  protected static ?string $model = AnggotaKelompok::class;
  protected static ?string $navigationGroup = 'Pelayanan';
  protected static ?string $navigationLabel = 'List Anggota Kelompok';
  protected static ?string $modelLabel = 'List Anggota Kelompok';
  protected static ?int $navigationSort = 3;
  protected static ?string $navigationIcon = 'heroicon-o-user-group';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('nama_anggota')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('jenis_kelamin')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('jurusan')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('bahan')
          ->maxLength(255),
        Forms\Components\TextInput::make('kategori')
          ->maxLength(255),
        Forms\Components\TextInput::make('kondisi')
          ->maxLength(255),
        Forms\Components\Select::make('kelompok_kecil_id')
          ->relationship('kelompok_kecil', 'id')
          ->required(),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->recordUrl(null)
      ->columns([
        Tables\Columns\TextColumn::make('no')
          ->rowIndex(),
        Tables\Columns\TextColumn::make('nama_anggota')
          ->label('Nama Anggota')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('jenis_kelamin')
          ->label('Jenis Kelamin')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('jurusan')
          ->label('Jurusan')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('kelompok_kecil.nama_kelompok')
          ->label('Nama Kelompok Kecil')
          ->searchable()
          ->numeric()
          ->sortable(),
        Tables\Columns\TextColumn::make('bahan')
          ->label('Bahan')
          ->searchable()
          ->sortable()
          ->badge()
          ->color('info'),
        Tables\Columns\TextColumn::make('kategori')
          ->label('Kategori')
          ->searchable()
          ->sortable()
          ->badge()
          ->color('info'),
        Tables\Columns\TextColumn::make('kondisi')
          ->label('Kondisi')
          ->searchable()
          ->sortable()
          ->badge()
          ->color('info'),

      ])
      ->filters([
        //
      ])
      ->actions([
        ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
      ])
      ->bulkActions([]);
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
      'index' => Pages\ListAnggotaKelompoks::route('/'),
      'create' => Pages\CreateAnggotaKelompok::route('/create'),
      'edit' => Pages\EditAnggotaKelompok::route('/{record}/edit'),
    ];
  }
}
