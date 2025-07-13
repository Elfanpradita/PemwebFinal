<?php

namespace App\Filament\Admin\Resources\MuridResource\Pages;

use App\Filament\Admin\Resources\MuridResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMurid extends EditRecord
{
    protected static string $resource = MuridResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
