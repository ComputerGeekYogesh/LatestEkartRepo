<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'sub_category_id',
        'name',
        'url',
        'small_description',
        'image',
        'p_highlight_heading',
        'p_highlight',
        'p_description_heading',
        'p_description',
        'p_details_heading',
        'p_details',
        'sale_tag',
        'original_price',
        'offer_price',
        'quantity',
        'priority',
        'new_arrival_products',
        'featured_products',
        'popular_products',
        'offers_products',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
     //* BelongsTo Relation in Laravel
     public function subcategory()
     {
         return $this->belongsTo(subcategory::class,'sub_category_id','id');   //*sub_category_id is the foreign key  of products table which refer to the id of subcategory table
     }
}
