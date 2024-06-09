<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelompokKecilResource\Pages;
use App\Filament\Resources\KelompokKecilResource\Pages\CreateKelompokKecil;
use App\Filament\Resources\KelompokKecilResource\RelationManagers;
use App\Filament\Resources\KelompokKecilResource\RelationManagers\AnggotaKelompokRelationManager;
use App\Models\KelompokKecil;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelompokKecilResource extends Resource
{
  protected static ?string $model = KelompokKecil::class;
  protected static ?string $navigationGroup = 'Pelayanan';
  protected static ?int $navigationSort = 2;
  protected static ?string $navigationIcon = 'heroicon-o-users';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Form Kelompok Kecil')
          ->schema([
            TextInput::make('nama_kelompok')
              ->label('Nama Kelompok Kecil')
              ->required()
              ->live(onBlur: true)
              ->afterStateUpdated(fn (Set $set, ?string $state) => $set('nama_kelompok', strtoupper($state))),
            Select::make('unit_pelayanan_id')
              ->label('Unit Pelayanan')
              ->relationship(name: 'unit_pelayanan', titleAttribute: 'nama_unit')
              ->searchable()
              ->required()
              ->preload(),
            Select::make('user_id')
              ->label('Pemimpin Kelompok Kecil')
              ->relationship(name: 'user', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query) => $query->where('role', 'leader'))
              ->searchable()
              ->required()
              ->preload(),
          ])->columnSpan(3),
        Section::make('Pilih Status Toko')
          ->schema([
            ToggleButtons::make('status_kelompok')
              ->label('Status Kelompok Kecil')
              ->options([
                'Aktif' => 'Aktif',
                'Tidak Aktif' => 'Tidak Aktif',
              ])
              ->colors([
                'Aktif' => 'success',
                'Tidak Aktif' => 'danger',
              ])
              ->icons([
                'Aktif' => 'heroicon-o-check',
                'Non-Aktif' => 'heroicon-o-x-mark',
              ])
              ->inline()
              ->required(),
          ])->columnSpan(1)
      ])->columns(4);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->modifyQueryUsing(function (Builder $query) {
        if (auth()->user()->role !== 'Administrator') {
          $query->where('user_id', auth()->user()->id);
        }
      })
      ->columns([
        TextColumn::make('no')
          ->rowIndex(),
        TextColumn::make('nama_kelompok')
          ->label('Kelompok Kecil')
          ->searchable()
          ->sortable(),
        TextColumn::make('unit_pelayanan.nama_unit')
          ->label('Unit Pelayanan')
          ->searchable()
          ->sortable(),
        TextColumn::make('user.name')
          ->label('Pemimpin Kelompok Kecil')
          ->searchable()
          ->sortable(),
        TextColumn::make('status_kelompok')
          ->label('Status Kelompok Kecil')
          ->searchable()
          ->sortable()
          ->badge()
          ->color(function (KelompokKecil $record) {
            return $record->status_kelompok == 'Aktif' ? 'success' : 'danger';
          }),
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
      AnggotaKelompokRelationManager::class,
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListKelompokKecils::route('/'),
      'create' => CreateKelompokKecil::route('/create'),
      'edit' => Pages\EditKelompokKecil::route('/{record}/edit'),
    ];
  }
}
