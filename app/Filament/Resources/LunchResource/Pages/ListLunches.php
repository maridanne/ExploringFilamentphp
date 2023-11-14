<?php

namespace App\Filament\Resources\LunchResource\Pages;

use App\Filament\Resources\LunchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLunches extends ListRecords
{
    protected static string $resource = LunchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
