<?php

namespace App\Filament\Resources\SellersResource\Pages;

use App\Filament\Resources\SellersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSellers extends ListRecords
{
    protected static string $resource = SellersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Criar Vendedor'),
        ];
    }
}
