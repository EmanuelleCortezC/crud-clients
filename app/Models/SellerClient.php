<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'client_id',
    ];
}
