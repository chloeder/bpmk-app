<?php

namespace App\Filament\Resources\KelompokKecilResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnggotaKelompokRelationManager extends RelationManager
{
  protected static string $relationship = 'anggota_kelompok';

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('nama_anggota')
          ->required()
          ->maxLength(255),
        Forms\Components\Select::make('jenis_kelamin')
          ->required()
          ->options([
            'Laki-laki' => 'Laki-laki',
            'Perempuan' => 'Perempuan',
          ])->native(false),
        Forms\Components\TextInput::make('jurusan')
          ->required()
          ->maxLength(255),
        Forms\Components\Radio::make('bahan')
          ->options([
            'PHB' => 'PHB',
            'MHB' => 'MHB',
            'KTK' => 'KTK',
            'BBR' => 'BBR',
            'BTKV' => 'BTKV',
            'PA TOKOH' => 'PA TOKOH',
          ])
          ->columns(3),
        Forms\Components\Radio::make('kategori')
          ->options([
            'PB' => 'PB',
            'M' => 'M',
            'PM' => 'PM',
          ])
          ->columns(3),
        Forms\Components\Radio::make('kondisi')
          ->options([
            'SEHAT (S)' => 'SEHAT (S)',
            'PINGSAN (P)' => 'PINGSAN (P)',
            'TIDAK SEHAT (TS)' => 'TIDAK SEHAT (TS)',
            'TIDAK JELAS (TJ)' => 'TIDAK JELAS (TJ)',
          ])
          ->columns(4)
      ])->columns(1);
  }

  public function table(Table $table): Table
  {
    return $table
      ->recordTitleAttribute('nama_anggota')
      ->columns([
        Tables\Columns\TextColumn::make('no')
          ->label('No')
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
      ->headerActions([
        Tables\Actions\CreateAction::make(),
      ])
      ->actions([
        ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\DeleteAction::make(),
        ])
      ])
      ->bulkActions([]);
  }
}
