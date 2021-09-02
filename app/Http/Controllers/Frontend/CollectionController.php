<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Models\group;
//use Illuminate\Http\Request;
use App\Models\Models\category;
use App\Models\Models\Products;
use App\Models\Models\subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

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
        $scategory_id = $scategory->id;
        $category_id = $scategory->category_id;
        $scategorylist = subcategory::where('category_id',$category_id)->get();

        if(Request::get('sort') =='price_asc'){
            $products = Products::where('sub_category_id', $scategory_id)
            ->orderBy('offer_price','asc')

            ->where('status','!=','2')
            ->where('status','0')->get();
        }
        elseif( (Request::get('sort') =='price_desc')){

                $products = Products::where('sub_category_id', $scategory_id)
                ->orderBy('offer_price','desc')
                ->where('status','!=','2')
                ->where('status','0')->get();
        }
        elseif( (Request::get('sort') =='newest')){

            $products = Products::where('sub_category_id', $scategory_id)
            ->orderBy('created_at','desc')
            ->where('status','!=','2')
            ->where('status','0')->get();
    }
    elseif( (Request::get('sort') =='popularity')){

        $products = Products::where('sub_category_id', $scategory_id)
        ->where('popular_products','1')
        ->where('status','!=','2')
        ->where('status','0')->get();
}
    elseif (Request::get('filterbrand')){
        $checked = $_GET['filterbrand'];

        //* filter with name
        $scategory_filter = subcategory::whereIn('name', $checked)->get();
        $scateid = [];
        foreach($scategory_filter as $scid_list){
            array_push( $scateid , $scid_list->id );

        }

         //* End filter with name
        $products = Products::whereIn('sub_category_id', $scateid )->where('status','0')->get();
    }
        else{
        $products = Products::where('sub_category_id', $scategory_id)->where('status','!=','2')->where('status','0')->get();
        }
        return view ('frontend.collection.products')->with('products',$products)->with('scategory',$scategory)->with('scategorylist',$scategorylist);
       }
       // return view('frontend.collection.products')->with('products',$products)->with(subcategory,$subcategory);


    public function productview($group_url,$cate_url,$subcate_url,$prod_url)
    {
        $products = Products::where('url',$prod_url)->where('status','!=','2')->where('status','0')->first();
        return view('frontend.collection.products-view')->with('products',$products);
    }

    public function searchautocomplete(Request $request)
    {
        $query = Request::get('term','');
        $products = Products::where('name','LIKE','%'.$query.'%')->where('status',0)->get();

        $data = [];
        foreach ($products as $items)
        {
            $data[] = [
                'value' => $items->name,
                'id' => $items->id
            ];
        }
        if(count($data))
        {
            return $data;
        }
        else
        {
            return ['value' => 'No Result Found', 'id'=>''];
        }
    }

    public function result(Request $request)
    {
        $searchingdata = Request::input('search_product');
        $products = Products::where('name','LIKE','%'.  $searchingdata.'%')->where('status',0)->first();
        if($products)
        {
            if(isset($_POST['searchbtn']))
            {
            return redirect('collection/'.$products->subcategory->category->group->url.'/'.$products->subcategory->category->url.'/'.$products->subcategory->url);
        }
        else
        {
            return redirect('collection/'.$products->subcategory->category->group->url.'/'.$products->subcategory->category->url.'/'.$products->subcategory->url.'/'.$products->url);

        } }
        //* return redirect ('search/'.$products->url);
        else
        {
            return redirect('/')->with('status','Product Not Available');
        }

    }

}
