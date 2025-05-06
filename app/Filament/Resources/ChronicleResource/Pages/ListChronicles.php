<?php

namespace App\Filament\Resources\ChronicleResource\Pages;

use App\Filament\Resources\ChronicleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChronicles extends ListRecords
{
    protected static string $resource = ChronicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
