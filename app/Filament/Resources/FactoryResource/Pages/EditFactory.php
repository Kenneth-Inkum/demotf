<?php

namespace App\Filament\Resources\FactoryResource\Pages;

use App\Filament\Resources\FactoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFactory extends EditRecord
{
    protected static string $resource = FactoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
