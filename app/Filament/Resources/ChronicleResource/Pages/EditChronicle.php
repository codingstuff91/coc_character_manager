<?php

namespace App\Filament\Resources\ChronicleResource\Pages;

use App\Filament\Resources\ChronicleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChronicle extends EditRecord
{
    protected static string $resource = ChronicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
