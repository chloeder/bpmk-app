<?php

namespace App\Filament\Resources\KelompokKecilResource\Pages;

use App\Filament\Resources\KelompokKecilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelompokKecil extends EditRecord
{
  protected static string $resource = KelompokKecilResource::class;
  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
