<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class Sellers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    public function clients()
    {
        return $this->belongsToMany(Clients::class, 'seller_client', 'seller_id', 'client_id');
    }
}
