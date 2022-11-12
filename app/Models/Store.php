<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id', 'city_id', 'latitude', 'longitude', 'address'
    ];

    public function city()
    {
        return City::find($this->city_id);
    }
}
