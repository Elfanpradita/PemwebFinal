<?php

namespace App\Filament\Admin\Resources\PengajarResource\Pages;

use App\Filament\Admin\Resources\PengajarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengajar extends EditRecord
{
    protected static string $resource = PengajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
