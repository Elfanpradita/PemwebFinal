<?php

namespace App\Filament\Admin\Resources\TestiResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\TestiResource;

class EditTesti extends EditRecord
{
    protected static string $resource = TestiResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
