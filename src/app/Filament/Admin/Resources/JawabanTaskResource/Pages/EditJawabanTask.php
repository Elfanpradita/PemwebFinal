<?php

namespace App\Filament\Admin\Resources\JawabanTaskResource\Pages;

use App\Filament\Admin\Resources\JawabanTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJawabanTask extends EditRecord
{
    protected static string $resource = JawabanTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
