<?php

namespace App\Filament\Resources\PenginjilanResource\Pages;

use App\Filament\Resources\PenginjilanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenginjilan extends CreateRecord
{
  protected static string $resource = PenginjilanResource::class;

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
