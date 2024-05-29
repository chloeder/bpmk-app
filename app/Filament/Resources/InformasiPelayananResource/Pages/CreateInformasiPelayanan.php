<?php

namespace App\Filament\Resources\InformasiPelayananResource\Pages;

use App\Filament\Resources\InformasiPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateInformasiPelayanan extends CreateRecord
{
  protected static string $resource = InformasiPelayananResource::class;
  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }
  protected function mutateFormDataBeforeCreate(array $data): array
  {
    $data['user_id'] = auth()->user()->id;

    return $data;
  }
}
