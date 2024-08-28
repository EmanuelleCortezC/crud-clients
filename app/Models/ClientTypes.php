<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class ClientTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function clients()
    {
        return $this->hasMany(Clients::class, 'type_id');
    }
}
