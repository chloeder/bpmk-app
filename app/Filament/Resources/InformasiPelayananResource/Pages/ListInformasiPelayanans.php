<?php

namespace App\Filament\Resources\InformasiPelayananResource\Pages;

use App\Filament\Resources\InformasiPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasiPelayanans extends ListRecords
{
    protected static string $resource = InformasiPelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
