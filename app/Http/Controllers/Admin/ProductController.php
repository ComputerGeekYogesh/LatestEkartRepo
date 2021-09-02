<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Models\category;
use App\Models\Models\Products;
use App\Models\Models\subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
            $products = Products::where('status','!=','3')->get();
            return view ('admin.collection.product.index')->with('products',$products); //* WITH with method we are passing the $products variable, products = $products
}
    public function create(){
    $category =  category::where('status','!=','3')->get();
    $scategory = subcategory::where('status','!=','3')->get();
    return view ('admin.collection.product.create')->with('scategory',$scategory)->with('category',$category);
}
    public function store(Request $request){
    $products = new Products();
    $products->name = $request->input('name');
    $products->category_id = $request->input('category_id');
    $products->sub_category_id = $request->input('sub_category_id');
    $products->name = $request->input('name');
    $products->url= $request->input('url');
    $products->small_description = $request->input('small_description');

    if ($request ->hasfile('prod_image'))
    {
        $image_file = $request->file('prod_image');
        $img_extension = $image_file->getClientOriginalExtension();  //*getting image extension
        $img_filename = time() . '-'. $img_extension;
        $image_file->move('uploads/products/',$img_filename);
        $products->image = $img_filename;
    }

    $products->sale_tag = $request->input('sale_tag');
    $products->original_price = $request->input('original_price');
    $products->offer_price= $request->input('offer_price');
    $products->quantity= $request->input('quantity');
    $products->priority = $request->input('priority');

    $products->p_highlight_heading = $request->input('p_highlight_heading');
    $products->p_highlight= $request->input('p_highlight');
    $products->p_description_heading = $request->input('p_description_heading');
    $products->p_description = $request->input('p_description');
    $products->p_details_heading = $request->input('p_details_heading');
    $products->p_details= $request->input('p_details');

    $products->meta_title = $request->input('meta_title');
    $products->meta_description = $request->input('meta_description');
    $products->meta_keyword = $request->input('meta_keyword');


    $products->new_arrival_products = $request->input('new_arrival') == true ? '1':'0';
    $products->featured_products = $request->input('featured_products') == true ? '1':'0';
    $products->popular_products= $request->input('popular_products') == true ? '1':'0';
    $products->offers_products = $request->input('offers_products') == true ? '1':'0';
    $products->status = $request->input('status') == true ? '1':'0';

    $products->save();
    return redirect()->back()->with('status','Product Successfully Added.!');


}
    public function edit($id){
    $category =  category::where('status','!=','3')->get();
    $scategory = subcategory::where ('status','!=','3')->get();  //* 3= deleted data's | sending $scategory also because there is a subcategory field in the product form which we also sometime required to edit
    $products = Products::find($id);
    return view('admin.collection.product.edit')->with('scategory',$scategory)->with('products',$products)->with('category',$category);
}

    public function update(Request $request, $id){
        $products =  Products::find($id);
        $products->name = $request->input('name');
        $products->category_id = $request->input('category_id');
        $products->sub_category_id = $request->input('sub_category_id');
        $products->name = $request->input('name');
        $products->url= $request->input('url');
        $products->small_description = $request->input('small_description');

        if ($request ->hasfile('prod_image'))
        {
            $image_file = $request->file('prod_image');
            $img_extension = $image_file->getClientOriginalExtension();  //*getting image extension
            $img_filename = time() . '-'. $img_extension;
            $image_file->move('uploads/products/',$img_filename);
            $products->image = $img_filename;
        }

        $products->sale_tag = $request->input('sale_tag');
        $products->original_price = $request->input('original_price');
        $products->offer_price= $request->input('offer_price');
        $products->quantity= $request->input('quantity');
        $products->priority = $request->input('priority');

        $products->p_highlight_heading = $request->input('p_highlight_heading');
        $products->p_highlight= $request->input('p_highlight');
        $products->p_description_heading = $request->input('p_description_heading');
        $products->p_description = $request->input('p_description');
        $products->p_details_heading = $request->input('p_details_heading');
        $products->p_details= $request->input('p_details');

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');


        $products->new_arrival_products = $request->input('new_arrival') == true ? '1':'0';
        $products->featured_products = $request->input('featured_products') == true ? '1':'0';
        $products->popular_products= $request->input('popular_products') == true ? '1':'0';
        $products->offers_products = $request->input('offers_products') == true ? '1':'0';
        $products->status = $request->input('status') == true ? '1':'0';

        $products->update();
        return redirect('product')->with('status','Product Details Updated Successfully.!');

}
    public function delete($id) {
        $products = Products::find($id);
        $products-> status = '3'; //* 3->Deleted Records
        $products->update();
    return redirect()->back()->with('status','Product Deleted Successfully');

}

    public function deletedrecords(){
        $products = Products::where('status','3')->get();
    return view ('admin.collection.product.deleted')->with('products',$products);

}
    public function deletedrestore($id) {
        $products = Products::find($id);
        $products-> status = "0"; //* 0-> show, 1->Hide , 2->Delete
        $products->update();
    return redirect('product')->with('status','Data Restore');

}
}
