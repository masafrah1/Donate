<?php

namespace App\Filament\Resources\Panel\OfflineAccountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Panel\OfflineAccountResource;

class ListOfflineAccounts extends ListRecords
{
    protected static string $resource = OfflineAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
