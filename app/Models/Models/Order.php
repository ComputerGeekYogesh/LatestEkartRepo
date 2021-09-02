<?php

namespace App\Models\Models;

use App\Models\User;
use App\Models\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'tracking_no',
        'tracking_msg',
        'payment_mode',
        'payment_id',
        'payment_status',
        'payment_status',
        'cancel_reason',
        'notify',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function orderitems()
    {
        return $this->hasmany(Orderitem::class,'order_id','id');
    }
}
