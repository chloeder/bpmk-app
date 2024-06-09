<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Filament\Resources\AnggotaResource\RelationManagers;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotaResource extends Resource
{
  protected static ?string $model = Anggota::class;
  protected static ?string $navigationGroup = 'Pelayanan';
  protected static ?string $navigationLabel = 'Anggota';
  protected static ?string $modelLabel = 'Anggota';
  protected static ?int $navigationSort = 4;
  protected static ?string $navigationIcon = 'heroicon-o-user-group';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Form Anggota')
          ->schema(
            [
              Forms\Components\TextInput::make('nama_anggota')
                ->label('Nama Anggota')
                ->required()
                ->maxLength(255),
              Forms\Components\Select::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->options([
                  'Laki-laki' => 'Laki-laki',
                  'Perempuan' => 'Perempuan',
                ])
                ->native(false)
                ->required(),
              Forms\Components\Select::make('jurusan_id')
                ->label('Jurusan')
                ->relationship('jurusan', 'nama_jurusan')
                ->searchable()
                ->preload()
                ->required()
                ->placeholder('Pilih Jurusan'),
              Forms\Components\TextInput::make('angkatan')
                ->required()
                ->maxLength(255),
            ]
          )
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('no')
          ->rowIndex(),
        Tables\Columns\TextColumn::make('nama_anggota')
          ->label('Nama Anggota')
          ->searchable(),
        Tables\Columns\TextColumn::make('jenis_kelamin')
          ->label('Jenis Kelamin')
          ->searchable(),
        Tables\Columns\TextColumn::make('jurusan.nama_jurusan')
          ->label('Jurusan')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('angkatan')
          ->searchable(),
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
      'index' => Pages\ListAnggotas::route('/'),
      'create' => Pages\CreateAnggota::route('/create'),
      'edit' => Pages\EditAnggota::route('/{record}/edit'),
    ];
  }
}
