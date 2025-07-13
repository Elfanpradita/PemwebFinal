<?php

namespace App\Filament\Admin\Resources\SertifikatResource\Pages;

use App\Filament\Admin\Resources\SertifikatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSertifikat extends EditRecord
{
    protected static string $resource = SertifikatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
