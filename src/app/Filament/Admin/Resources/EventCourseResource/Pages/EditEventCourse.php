<?php

namespace App\Filament\Admin\Resources\EventCourseResource\Pages;

use App\Filament\Admin\Resources\EventCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventCourse extends EditRecord
{
    protected static string $resource = EventCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
