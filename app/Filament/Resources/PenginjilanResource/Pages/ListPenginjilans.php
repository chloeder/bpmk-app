<?php

namespace App\Filament\Resources\PenginjilanResource\Pages;

use App\Filament\Resources\PenginjilanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenginjilans extends ListRecords
{
    protected static string $resource = PenginjilanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
