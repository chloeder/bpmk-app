<?php

namespace App\Filament\Resources\SahabatDoaResource\Pages;

use App\Filament\Resources\SahabatDoaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSahabatDoas extends ListRecords
{
    protected static string $resource = SahabatDoaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
