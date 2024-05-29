<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenginjilanResource\Pages;
use App\Filament\Resources\PenginjilanResource\RelationManagers;
use App\Models\Penginjilan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenginjilanResource extends Resource
{
  protected static ?string $model = Penginjilan::class;
  protected static ?string $navigationGroup = 'Penginjilan';
  protected static ?int $navigationSort = 2;
  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Form Penginjilan')
          ->schema([
            Forms\Components\TextInput::make('nama_penginjil')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('nama_diinjili')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('bahan')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('jumlah_diinjili')
              ->required()
              ->maxLength(255),
          ]),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('no')
          ->label('No')
          ->rowIndex(),
        Tables\Columns\TextColumn::make('nama_penginjil')
          ->label('Nama Penginjil')
          ->searchable(),
        Tables\Columns\TextColumn::make('nama_diinjili')
          ->label('Nama Diinjili')
          ->searchable(),
        Tables\Columns\TextColumn::make('bahan')
          ->label('Bahan')
          ->searchable(),
        Tables\Columns\TextColumn::make('jumlah_diinjili')
          ->label('Jumlah Diinjili')
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
      'index' => Pages\ListPenginjilans::route('/'),
      'create' => Pages\CreatePenginjilan::route('/create'),
      'edit' => Pages\EditPenginjilan::route('/{record}/edit'),
    ];
  }
}
