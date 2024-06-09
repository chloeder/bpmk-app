<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JurusanResource\Pages;
use App\Filament\Resources\JurusanResource\RelationManagers;
use App\Models\Jurusan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JurusanResource extends Resource
{
  protected static ?string $model = Jurusan::class;
  protected static ?string $navigationGroup = 'Pelayanan';
  protected static ?string $navigationLabel = 'Jurusan';
  protected static ?string $modelLabel = 'Jurusan';
  protected static ?int $navigationSort = 5;
  protected static ?string $navigationIcon = 'heroicon-o-building-library';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Form Jurusan')
          ->schema([
            Forms\Components\TextInput::make('nama_jurusan')
              ->label('Jurusan')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('fakultas')
              ->required()
              ->maxLength(255),
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('no')
          ->rowIndex(),
        Tables\Columns\TextColumn::make('nama_jurusan')
          ->searchable(),
        Tables\Columns\TextColumn::make('fakultas')
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
      'index' => Pages\ListJurusans::route('/'),
      'create' => Pages\CreateJurusan::route('/create'),
      'edit' => Pages\EditJurusan::route('/{record}/edit'),
    ];
  }
}
