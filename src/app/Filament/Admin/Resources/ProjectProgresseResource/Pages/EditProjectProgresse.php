<?php

namespace App\Filament\Admin\Resources\ProjectProgresseResource\Pages;

use App\Filament\Admin\Resources\ProjectProgresseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectProgresse extends EditRecord
{
    protected static string $resource = ProjectProgresseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
