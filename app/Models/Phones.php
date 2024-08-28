<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class Phones extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}
