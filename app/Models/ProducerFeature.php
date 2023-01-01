<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducerFeature extends Model
{
    use HasFactory;
    protected $fillable = [
        'producer_id', 'key', 'value'
    ];

}
