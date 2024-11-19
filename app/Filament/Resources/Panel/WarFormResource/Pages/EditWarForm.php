<?php

namespace App\Filament\Resources\Panel\WarFormResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Panel\WarFormResource;

class EditWarForm extends EditRecord
{
    protected static string $resource = WarFormResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
