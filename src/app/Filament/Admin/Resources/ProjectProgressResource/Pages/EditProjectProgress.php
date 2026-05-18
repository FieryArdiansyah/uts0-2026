<?php

namespace App\Filament\Admin\Resources\ProjectProgressResource\Pages;

use App\Filament\Admin\Resources\ProjectProgressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectProgress extends EditRecord
{
    protected static string $resource = ProjectProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
