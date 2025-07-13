<?php

namespace App\Filament\Admin\Resources\KegiatanResource\Pages;

use App\Filament\Admin\Resources\KegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKegiatans extends ListRecords
{
    protected static string $resource = KegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
