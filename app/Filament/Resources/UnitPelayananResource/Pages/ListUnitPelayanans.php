<?php

namespace App\Filament\Resources\UnitPelayananResource\Pages;

use App\Filament\Resources\UnitPelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnitPelayanans extends ListRecords
{
    protected static string $resource = UnitPelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
