<?php

namespace App\Models;

use App\Http\Controllers\ProductPriceController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 'user_id', 'product_catagory_id'
    ];

    public function price()
    {
        $price = ProductPrice::where('product_id', $this->id)->whereNotNull('price')->latest()->first();
        $price->price = ProductPriceController::cal_price($price->price);
        $price->agency_price = ProductPriceController::cal_price($price->agency_price);
        $price->wholesaler_price = ProductPriceController::cal_price($price->wholesaler_price);
        return $price;
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

        $price = collect($rows)->sortBy('price.price')->first()?->price;
        if($price?->price){
            $price = ProductPriceController::cal_price($price);
        }
        return $price;
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
