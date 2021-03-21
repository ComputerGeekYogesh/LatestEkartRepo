<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
