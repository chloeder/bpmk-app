<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
  protected static ?string $model = User::class;
  protected static ?string $navigationGroup = 'Settings';
  protected static ?string $navigationLabel = 'Akun';
  protected static ?string $modelLabel = 'Akun';
  protected static ?int $navigationSort = 3;
  protected static ?string $navigationIcon = 'heroicon-o-user-circle';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Informasi Akun')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('email')
              ->email()
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('password')
              ->password()
              ->required()
              ->maxLength(255),
            Forms\Components\Select::make('role')
              ->options([
                'Admin' => 'Admin',
                'Leader' => 'Leader',
              ])
              ->native(false)
              ->required(),

          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->recordUrl(null)
      ->columns([
        Tables\Columns\TextColumn::make('no')
          ->rowIndex(),
        Tables\Columns\TextColumn::make('name')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('email')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('role')
          ->sortable()
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
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }
}
