<?php

namespace App\Filament\Resources\ClientsResource\Pages;

use App\Filament\Resources\ClientsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CreateClients extends CreateRecord
{
    protected static string $resource = ClientsResource::class;

    protected function afterCreate(): void
    {
        Log::info('Enviando e=mail ao cliente: ' . $this->record->email);

        Mail::to($this->record->email)->send(new WelcomeEmail($this->record));

        Log::info('Email enviado ao cliente: ' . $this->record->email);
    }
}
