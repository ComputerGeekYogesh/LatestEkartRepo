<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
        'name',
        'url',
        'description',
        'status', ];

}
