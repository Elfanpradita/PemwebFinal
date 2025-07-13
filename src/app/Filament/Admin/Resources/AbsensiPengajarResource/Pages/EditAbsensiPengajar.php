<?php

namespace App\Filament\Admin\Resources\AbsensiPengajarResource\Pages;

use App\Filament\Admin\Resources\AbsensiPengajarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiPengajar extends EditRecord
{
    protected static string $resource = AbsensiPengajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
