<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'group_id',
        'url',
        'name',
        'description',
        'image',
        'icon',
        'status',
    ];

    //* BelongsTo Relation in Laravel
    public function group()
    {
        return $this->belongsTo(group::class,'group_id','id');   //*group_id of category table is the foreign key which refer to  the id of group table
    }
}
