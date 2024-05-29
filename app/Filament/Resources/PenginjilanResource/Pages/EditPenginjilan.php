<?php

namespace App\Filament\Resources\PenginjilanResource\Pages;

use App\Filament\Resources\PenginjilanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenginjilan extends EditRecord
{
  protected static string $resource = PenginjilanResource::class;

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
}
