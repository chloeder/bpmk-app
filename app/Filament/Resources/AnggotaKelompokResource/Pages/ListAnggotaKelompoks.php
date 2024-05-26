<?php

namespace App\Filament\Resources\AnggotaKelompokResource\Pages;

use App\Filament\Resources\AnggotaKelompokResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnggotaKelompoks extends ListRecords
{
  protected static string $resource = AnggotaKelompokResource::class;

  // protected function getHeaderActions(): array
  // {
  //     return [
  //         Actions\CreateAction::make(),
  //     ];
  // }
}
