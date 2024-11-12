<?php

namespace App\Filament\Resources\Panel\OfflineAccountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Panel\OfflineAccountResource;

class ViewOfflineAccount extends ViewRecord
{
    protected static string $resource = OfflineAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\EditAction::make()];
    }
}
