<?php

namespace App\Filament\Resources\SellersResource\Pages;

use App\Filament\Resources\SellersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSellers extends EditRecord
{
    protected static string $resource = SellersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
