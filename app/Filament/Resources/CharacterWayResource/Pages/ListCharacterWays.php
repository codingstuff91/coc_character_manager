<?php

namespace App\Filament\Resources\CharacterWayResource\Pages;

use App\Filament\Resources\CharacterWayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCharacterWays extends ListRecords
{
    protected static string $resource = CharacterWayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
