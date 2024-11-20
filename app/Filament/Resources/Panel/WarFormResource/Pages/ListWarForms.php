<?php

namespace App\Filament\Resources\Panel\WarFormResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Panel\WarFormResource;
use App\Filament\Resources\WarFormResource\Widgets\WarFormCountWidget;


class ListWarForms extends ListRecords
{
    protected static string $resource = WarFormResource::class;

    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            WarFormCountWidget::class,
        ];
    }
}
