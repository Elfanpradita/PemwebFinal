<?php

namespace App\Filament\Admin\Resources\TestiResource\Pages;

use App\Filament\Admin\Resources\TestiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestis extends ListRecords
{
    protected static string $resource = TestiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
