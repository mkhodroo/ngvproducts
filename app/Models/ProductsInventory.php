<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsInventory extends Model
{
    use HasFactory;
    public $table = 'product_inventories';
    protected $fillable = [
        'store_id', 'product_producer_id', 'number'
    ];

    public function store()
    {
        return Store::find($this->store_id);
    }

    public function producer()
    {
        return ProductProducer::find($this->product_producer_id);
    }
}
