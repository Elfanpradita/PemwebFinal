<?php

namespace App\Filament\Admin\Resources\AbtpointResource\Pages;

use App\Filament\Admin\Resources\AbtpointResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbtpoints extends ListRecords
{
    protected static string $resource = AbtpointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
