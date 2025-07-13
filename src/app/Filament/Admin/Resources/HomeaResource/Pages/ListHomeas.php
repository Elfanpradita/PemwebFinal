<?php

namespace App\Filament\Admin\Resources\HomeaResource\Pages;

use App\Filament\Admin\Resources\HomeaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomeas extends ListRecords
{
    protected static string $resource = HomeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
