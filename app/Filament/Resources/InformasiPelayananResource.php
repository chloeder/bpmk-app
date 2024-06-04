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
use Filament\Tables\Actions\ActionGroup;
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
            Forms\Components\TextInput::make('judul')
              ->label('Judul')
              ->required(),
            Forms\Components\TextInput::make('jenis_pelayanan')
              ->label('Jenis Pelayanan')
              ->required(),
            Forms\Components\TextArea::make('deskripsi')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('tempat_pelayanan')
              ->label('Tempat')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('nomor_telepon')
              ->label('Nomor Telepon')
              ->prefix('+62')
              ->tel()
              ->required()
              ->maxLength(255),
            Forms\Components\DateTimePicker::make('tanggal_pelayanan')
              ->label('Tanggal & Waktu')
              ->required(),
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
        Tables\Columns\TextColumn::make('user.name')
          ->label('Pembuat')
          ->numeric()
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
