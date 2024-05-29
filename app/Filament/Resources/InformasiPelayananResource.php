<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiPelayananResource\Pages;
use App\Filament\Resources\InformasiPelayananResource\RelationManagers;
use App\Models\InformasiPelayanan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformasiPelayananResource extends Resource
{
  protected static ?string $model = InformasiPelayanan::class;
  protected static ?string $navigationGroup = 'Penginjilan';
  protected static ?int $navigationSort = 3;
  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Form Informasi Pelayanan')
          ->schema([
            Forms\Components\Select::make('jenis_pelayanan')
              ->options([
                'Pelayanan 1' => 'Pelayanan 1',
                'Pelayanan 2' => 'Pelayanan 2',
              ])
              ->native(false)
              ->required(),
            Forms\Components\Textarea::make('deskripsi')
              ->required()
              ->maxLength(255),
            Forms\Components\FileUpload::make('image')
              ->image()
              ->required(),
          ]),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('jenis_pelayanan')
          ->label('Jenis Pelayanan')
          ->searchable(),
        Tables\Columns\TextColumn::make('deskripsi')
          ->label('Deskripsi')
          ->searchable(),
        Tables\Columns\ImageColumn::make('image')
          ->width(200)
          ->label('Image'),
        Tables\Columns\TextColumn::make('user.name')
          ->label('Pembuat')
          ->numeric()
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
      'index' => Pages\ListInformasiPelayanans::route('/'),
      'create' => Pages\CreateInformasiPelayanan::route('/create'),
      'edit' => Pages\EditInformasiPelayanan::route('/{record}/edit'),
    ];
  }
}
