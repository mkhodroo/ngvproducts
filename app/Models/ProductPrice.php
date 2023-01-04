<?php

namespace App\Models;

use App\Http\Controllers\ProductPriceController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $table = "product_prices";



    protected $fillable = [
        'product_id', 'price', 'product_producer_id', 'agency_price', 'min_agency_number',
        'wholesaler_price', 'min_wholesaler_number'
    ];


    public function product()
    {
        return Product::find($this->product_id);
    }

    public function producer()
    {
        return ProductProducer::find($this->product_producer_id);
    }

    public static function last_price($pp_id)
    {
        return ProductPrice::where('product_producer_id', $pp_id)->orderBy('id','desc')->first();
    }

    public static function producer_prices($producer_id)
    {
        return ProductPrice::where('product_producer_id', $producer_id)->get();
    }
}
