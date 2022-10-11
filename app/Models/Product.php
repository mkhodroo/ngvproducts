<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 'user_id'
    ];

    public function price()
    {
        return ProductPrice::where('product_id', $this->id)->latest()->first();
    }
}
