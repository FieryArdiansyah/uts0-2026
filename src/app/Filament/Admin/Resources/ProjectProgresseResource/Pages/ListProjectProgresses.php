<?php

namespace App\Filament\Admin\Resources\ProjectProgresseResource\Pages;

use App\Filament\Admin\Resources\ProjectProgresseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectProgresses extends ListRecords
{
    protected static string $resource = ProjectProgresseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
