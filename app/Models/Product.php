<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 'user_id', 'product_catagory_id'
    ];

    public function price()
    {
        return ProductPrice::where('product_id', $this->id)->latest()->first();
    }

    public function min_price()
    {
        return ProductPrice::where('product_id', $this->id)->orderBy('price', 'asc')->first();
    }

    public function images()
    {
        return ProductImage::where('product_id', $this->id)->get();
    }

    public function main_image()
    {
        return ProductImage::where('product_id', $this->id)->first();
    }

    public function producers()
    {
        return ProductProducer::where('product_id', $this->id)->get();
    }

    public function catagory()
    {
        return ProductCatagory::find($this->product_catagory_id);
    }
}
