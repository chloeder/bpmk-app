<?php

namespace App\Filament\Resources\InformasiPelayananResource\Pages;

use App\Filament\Resources\InformasiPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasiPelayanan extends EditRecord
{
  protected static string $resource = InformasiPelayananResource::class;
  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
