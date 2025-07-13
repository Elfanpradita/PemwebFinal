<?php

namespace App\Filament\Admin\Resources\PenggajianResource\Pages;

use App\Filament\Admin\Resources\PenggajianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenggajian extends EditRecord
{
    protected static string $resource = PenggajianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
