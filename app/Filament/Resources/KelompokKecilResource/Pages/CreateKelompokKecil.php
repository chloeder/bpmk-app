<?php

namespace App\Filament\Resources\KelompokKecilResource\Pages;

use App\Filament\Resources\KelompokKecilResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelompokKecil extends CreateRecord
{
  protected static string $resource = KelompokKecilResource::class;
  protected static bool $canCreateAnother = false;
  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
