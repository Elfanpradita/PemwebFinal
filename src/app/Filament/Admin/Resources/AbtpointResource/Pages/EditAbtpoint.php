<?php

namespace App\Filament\Admin\Resources\AbtpointResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\AbtpointResource;

class EditAbtpoint extends EditRecord
{
    protected static string $resource = AbtpointResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
