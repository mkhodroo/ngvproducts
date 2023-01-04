<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceParams extends Model
{
    use HasFactory;
    public $table = 'price_parameters';
    protected $fillable = [
        'key', 'value'
    ];
}

