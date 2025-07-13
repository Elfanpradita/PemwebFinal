<?php

namespace App\Filament\Admin\Resources\ModulResource\Pages;

use App\Filament\Admin\Resources\ModulResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModuls extends ListRecords
{
    protected static string $resource = ModulResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
