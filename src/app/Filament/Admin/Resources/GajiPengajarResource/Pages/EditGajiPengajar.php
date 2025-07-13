<?php

namespace App\Filament\Admin\Resources\GajiPengajarResource\Pages;

use App\Filament\Admin\Resources\GajiPengajarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGajiPengajar extends EditRecord
{
    protected static string $resource = GajiPengajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
