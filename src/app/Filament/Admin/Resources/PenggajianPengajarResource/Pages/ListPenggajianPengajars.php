<?php

namespace App\Filament\Admin\Resources\PenggajianPengajarResource\Pages;

use App\Filament\Admin\Resources\PenggajianPengajarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenggajianPengajars extends ListRecords
{
    protected static string $resource = PenggajianPengajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
