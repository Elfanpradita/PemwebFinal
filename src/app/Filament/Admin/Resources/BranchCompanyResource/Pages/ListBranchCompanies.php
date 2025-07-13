<?php

namespace App\Filament\Admin\Resources\BranchCompanyResource\Pages;

use App\Filament\Admin\Resources\BranchCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBranchCompanies extends ListRecords
{
    protected static string $resource = BranchCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
