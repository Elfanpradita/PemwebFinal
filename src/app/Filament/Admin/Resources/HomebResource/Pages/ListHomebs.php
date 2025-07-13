<?php

namespace App\Filament\Admin\Resources\HomebResource\Pages;

use App\Filament\Admin\Resources\HomebResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomebs extends ListRecords
{
    protected static string $resource = HomebResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
