<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\group;
use App\Models\Models\category;
use App\Models\Models\subcategory;
use App\Models\Models\Products;

class CollectionController extends Controller
{
    public function index(){
        $groups = group::where ('status','0')->get();
        return view ('frontend.collections.index')->with('groups', $groups);
    }
    public function groupview($group_url){
        $group = group::where ('url',$group_url)->first();
        $group_id = $group->id;
        $category = category::where('group_id',$group_id)->where('status','!=','2')->where('status','0')->get();
        return view ('frontend.collection.category')->with('category',$category)->with('group',$group);
    }
    public function categoryview($group_url,$cate_url){
        $category = category::where('url',$cate_url)->first();
        $category_id = $category->id;
        $scategory = subcategory::where('category_id', $category_id)->where('status','!=','2')->where('status','0')->get();
        return view ('frontend.collection.sub-category')->with('category',$category)->with('scategory',$scategory);

    }

    public function subcategoryview($group_url,$cate_url,$subcate_url){
        $scategory = subcategory::where('url',$subcate_url)->first();
        $subcategory_id = $scategory->id;

                            //! Fillteration Part is not working upto elseif sort Video part 28

         $v= new Request();
        if($v->get('sort') =='price_asc'){
            $products = Products::where('sub_category_id', $subcategory_id)
            ->orderBy('offer_price','asc')

            ->where('status','!=','2')
            ->where('status','0')->get();
        }
        elseif( ($v->get('sort') =='price_desc')){

                $products = Products::where('sub_category_id', $subcategory_id)
                ->orderBy('offer_price','desc')
                ->where('status','!=','2')
                ->where('status','0')->get();
        }
        elseif( ($v->get('sort') =='newest')){

            $products = Products::where('sub_category_id', $subcategory_id)
            ->orderBy('created_at','desc')
            ->where('status','!=','2')
            ->where('status','0')->get();
    }
    elseif( ($v->get('sort') =='popularity')){

        $products = Products::where('sub_category_id', $subcategory_id)
        ->where('popular_products','1')
        ->where('status','!=','2')
        ->where('status','0')->get();
}
        else{
        $products = Products::where('sub_category_id', $subcategory_id)->where('status','!=','2')->where('status','0')->get();
        }
        return view ('frontend.collection.products')->with('products',$products)->with('scategory',$scategory);
       }
       // return view('frontend.collection.products')->with('products',$products)->with(subcategory,$subcategory);


    public function productview($group_url,$cate_url,$subcate_url,$prod_url)
    {
        $products = Products::where('url',$prod_url)->where('status','!=','2')->where('status','0')->first();
        return view('frontend.collection.products-view')->with('products',$products);
    }
}
