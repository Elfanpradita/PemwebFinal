<?php

namespace App\Filament\Admin\Resources\HomecResource\Pages;

use App\Filament\Admin\Resources\HomecResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomecs extends ListRecords
{
    protected static string $resource = HomecResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
