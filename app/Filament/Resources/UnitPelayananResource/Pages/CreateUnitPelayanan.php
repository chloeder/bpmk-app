<?php

namespace App\Filament\Resources\UnitPelayananResource\Pages;

use App\Filament\Resources\UnitPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUnitPelayanan extends CreateRecord
{
  protected static string $resource = UnitPelayananResource::class;
  protected static bool $canCreateAnother = false;
  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
