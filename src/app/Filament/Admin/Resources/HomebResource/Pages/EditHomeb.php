<?php

namespace App\Filament\Admin\Resources\HomebResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\HomebResource;

class EditHomeb extends EditRecord
{
    protected static string $resource = HomebResource::class;

    protected function getHeaderActions(): array
    {
        return [
];
    }
}
