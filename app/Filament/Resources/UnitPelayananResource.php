<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitPelayananResource\Pages;
use App\Filament\Resources\UnitPelayananResource\RelationManagers;
use App\Models\UnitPelayanan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitPelayananResource extends Resource
{
  protected static ?string $model = UnitPelayanan::class;
  protected static ?string $navigationGroup = 'Pelayanan';
  protected static ?int $navigationSort = 1;
  protected static ?string $navigationIcon = 'heroicon-o-building-library';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Form Unit Pelayanan')
          ->schema([
            TextInput::make('nama_unit')
              ->label('Nama Unit Pelayanan')
              ->required()
              ->live(onBlur: true)
              ->afterStateUpdated(fn (Set $set, ?string $state) => $set('nama_unit', strtoupper($state))),
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->recordUrl(null)
      ->columns([
        TextColumn::make('no')
          ->rowIndex(),
        TextColumn::make('nama_unit')
          ->label('Unit Pelayanan')
          ->searchable()
          ->sortable(),
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
      'index' => Pages\ListUnitPelayanans::route('/'),
      'create' => Pages\CreateUnitPelayanan::route('/create'),
      'edit' => Pages\EditUnitPelayanan::route('/{record}/edit'),
    ];
  }
}
