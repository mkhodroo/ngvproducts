<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_producer_id','order_code', 'price', 'number', 'user_id', 'how_to_send', 
        'customer_address_id', 'payment_status', 'payment_tracking_number',
        'delivery_status'
    ];
}
