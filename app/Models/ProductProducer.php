<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProducer extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'name'
    ];

    public function price()
    {
        return ProductPrice::where('product_id', $this->product_id)
            ->where('product_producer_id', $this->id)->latest()->first();
    }

    public function product()
    {
        return Product::find($this->product_id);
    }
}
