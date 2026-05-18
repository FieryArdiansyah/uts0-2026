<?php

namespace App\Filament\Admin\Resources\ProjectProgressResource\Pages;

use App\Filament\Admin\Resources\ProjectProgressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectProgress extends ListRecords
{
    protected static string $resource = ProjectProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
