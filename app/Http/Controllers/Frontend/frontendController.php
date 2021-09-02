<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Models\Products;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class frontendController extends Controller
{
    public function index()
    {
        $products = Products::where('status',0)
        ->where('new_arrival_products',1)
        ->orderBy('created_at','desc')
        ->take(15)
        ->get();
        $slider = Slider::where('status','0')->get();
        return view ('frontend.index',compact('products','slider'));
    }

    public function newarrivals()
    {
        $products = Products::where('status',0)
        ->where('new_arrival_products',1)
        ->orderBy('created_at','desc')
        ->get();
        return view ('frontend.newarrivals.index ',compact('products'));
    }
}
