<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Models\Clients;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = Clients::query();

        if ($request->has('name')) {
            $clients->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $clients = $clients->with('phones', 'sellers', 'type')->paginate(15);

        return ClientResource::collection($clients);
    }
}
