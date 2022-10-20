<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_producer_id', 'number', 'user_id'
    ];

    public function producer()
    {
        return ProductProducer::find($this->product_producer_id);
    }

    public function product()
    {
        return Product::find($this->producer()->product_id);
    }

    public function price()
    {
        return $this->producer()->price();
    }
}
