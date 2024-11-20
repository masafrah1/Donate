<?php

namespace App\Filament\Resources\WarFormResource\Widgets;

use App\Models\WarForm;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class WarFormCountWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total War Forms', WarForm::count())
                ->description('Total number of War Forms in the system')
                // ->icon('heroicon-o-collection') // Optional: Add an icon
                ->color('success'), // Optional: Customize color
        ];
    }
}
