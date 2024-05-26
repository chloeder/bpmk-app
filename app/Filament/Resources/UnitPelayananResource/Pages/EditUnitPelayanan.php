<?php

namespace App\Filament\Resources\UnitPelayananResource\Pages;

use App\Filament\Resources\UnitPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnitPelayanan extends EditRecord
{
  protected static string $resource = UnitPelayananResource::class;
  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
