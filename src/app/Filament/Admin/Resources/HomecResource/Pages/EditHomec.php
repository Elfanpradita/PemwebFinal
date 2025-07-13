<?php

namespace App\Filament\Admin\Resources\HomecResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\HomecResource;

class EditHomec extends EditRecord
{
    protected static string $resource = HomecResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
