<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Models\Clients;
use Illuminate\Support\Facades\Cache;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Verificar se o resultado já está no cache, caso contrário cria uma chave de hash
        $clients = Cache::remember('clients_' . hash('sha256', json_encode($request->all())), 1200, function () use ($request) {
            $query = Clients::query();

            if ($request->has('name')) {
                $query->where('name', 'like', '%' . $request->input('name') . '%');
            }

            return $query->with('phones', 'sellers', 'type')->paginate(15);
        });

        return ClientResource::collection($clients);
    }
}
