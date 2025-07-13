<?php

namespace App\Filament\Admin\Resources\HomeaResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\HomeaResource;

class EditHomea extends EditRecord
{
    protected static string $resource = HomeaResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
