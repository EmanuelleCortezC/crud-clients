<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientTypes;
use App\Models\Phones;
use App\Models\Sellers;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'image',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(ClientTypes::class, 'type_id');
    }

    public function sellers()
    {
        return $this->belongsToMany(Sellers::class, 'seller_client', 'client_id', 'seller_id');
    }

    public function phones()
    {
        return $this->hasMany(Phones::class);
    }
}
