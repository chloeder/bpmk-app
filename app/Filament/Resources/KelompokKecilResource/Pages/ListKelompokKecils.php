<?php

namespace App\Filament\Resources\KelompokKecilResource\Pages;

use App\Filament\Resources\KelompokKecilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelompokKecils extends ListRecords
{
    protected static string $resource = KelompokKecilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
