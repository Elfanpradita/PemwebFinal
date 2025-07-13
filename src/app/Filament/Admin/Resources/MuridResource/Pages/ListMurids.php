<?php

namespace App\Filament\Admin\Resources\MuridResource\Pages;

use App\Filament\Admin\Resources\MuridResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMurids extends ListRecords
{
    protected static string $resource = MuridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
