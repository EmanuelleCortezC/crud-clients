<?php

namespace App\Filament\Resources\ClientsResource\Pages;

use App\Filament\Resources\ClientsResource;
use Filament\Resources\Pages\CreateRecord;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendWelcomeEmail;

class CreateClients extends CreateRecord
{
    protected static string $resource = ClientsResource::class;

    protected function afterCreate(): void
    {
        //Enviar email com fila
        SendWelcomeEmail::dispatch($this->record->id)->onQueue('emails');
    }
}
