<?php

namespace App\Models\Models;

use App\Models\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderitem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'tax_amt',
        'quantity',
        'discount_price',
        'grand_total'
    ];

    public function products()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }

}
