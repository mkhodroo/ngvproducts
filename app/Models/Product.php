<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 'user_id', 'product_catagory_id'
    ];

    public function price()
    {
        return ProductPrice::where('product_id', $this->id)->whereNotNull('price')->latest()->first();
    }

    public function min_price()
    {
        $rows =  ProductPrice::whereNotNull('price')
        ->select(DB::raw('max(id) as id'))
        ->groupBy('product_id', 'product_producer_id')
        ->where('product_id', $this->id)
        ->orderBy('id', 'desc')->get()->each(function($c){
            $c->price = ProductPrice::find($c->id);
        });

        return collect($rows)->sortBy('price.price')->first()?->price;
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
