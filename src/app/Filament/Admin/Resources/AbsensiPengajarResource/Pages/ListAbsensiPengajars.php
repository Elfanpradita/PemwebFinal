<?php

namespace App\Filament\Admin\Resources\AbsensiPengajarResource\Pages;

use App\Filament\Admin\Resources\AbsensiPengajarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensiPengajars extends ListRecords
{
    protected static string $resource = AbsensiPengajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
