<?php

namespace App\Filament\Resources\Panel\OfflineAccountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Panel\OfflineAccountResource;

class EditOfflineAccount extends EditRecord
{
    protected static string $resource = OfflineAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
