<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id', 'user_id', 'address', 
    ];

    public function city()
    {
        return City::find($this->city_id);
    }
}
