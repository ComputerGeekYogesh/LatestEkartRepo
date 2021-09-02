<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subcategory extends Model
{
    protected $table = 'subcategorys';
    protected $fillable = [
        'category_id',
        'url',
        'name',
        'description',
        'image',
    ];
    //* BelongsTo Relation in Laravel
    public function category()
    {
        return $this->belongsTo(category::class,'category_id','id');   //*category_id of category is the foreign key which refer to the id of category table
    }

    public function products()
{
    return $this->hasMany(Products::class,'sub_category_id','id')->where('status',0);
}
}


