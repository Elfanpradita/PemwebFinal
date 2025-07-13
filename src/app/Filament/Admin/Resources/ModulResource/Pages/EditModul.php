<?php

namespace App\Filament\Admin\Resources\ModulResource\Pages;

use App\Filament\Admin\Resources\ModulResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModul extends EditRecord
{
    protected static string $resource = ModulResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
