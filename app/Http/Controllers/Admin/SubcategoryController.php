<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\subcategory;
use App\Models\Models\category;
use Illuminate\Support\Facades\File;

class SubcategoryController extends Controller
{
    public function index(){
        $category = category::where('status','!=','3')->get();
        $scategory = subcategory::where('status','!=','3')->get(); // 3-> delele Records
        return view ('admin.collection.subcategory.index')->with('scategory',$scategory)->with('category',$category);
}
public function store(Request $request){
    $scategory = new subcategory();
    $scategory->category_id = $request->input('category_id');
    $scategory->name = $request->input('name');
    $scategory->url = $request->input('url');
    $scategory->description= $request->input('description');

    if ($request ->hasfile('image'))
    {
        $image_file = $request->file('image');
        $img_extension = $image_file->getClientOriginalExtension();  //*getting image extension
        $img_filename = time() . '-'. $img_extension;
        $image_file->move('uploads/subcategory/',$img_filename);
        $scategory->image = $img_filename;
    }
    $scategory->priority = $request->input('priority');
    $scategory->status = $request->input('status')== true ? '1':'0';
    $scategory-> save();

    return redirect()->back()->with('status','Subcategory Saved Successfully');

}
    public function edit($id){
    $category = category::where ('status','!=','3')->get();  //* 3= deleted data's
    $scategory = subcategory::find($id);
    return view('admin.collection.subcategory.edit')->with('scategory',$scategory)->with('category',$category);
}

    public function update(Request $request, $id){
    $scategory =  subcategory::find($id);
    $scategory->category_id = $request->input('category_id');
    $scategory->name = $request->input('name');
    $scategory->url = $request->input('url');
    $scategory->description= $request->input('description');
    if ($request ->hasfile('image'))
    {
        $filepath_image= 'uploads/subcategory/'.$scategory->image;
            if (File::exists($filepath_image)){
                File::delete($filepath_image);
            }
        $image_file = $request->file('image');
        $img_extension = $image_file->getClientOriginalExtension();  //*getting image extension
        $img_filename = time() . '-'. $img_extension;
        $image_file->move('uploads/subcategory/',$img_filename);
        $scategory->image = $img_filename;
    }
    $scategory->priority = $request->input('priority');
    $scategory->status = $request->input('status')== true ? '1':'0';
    $scategory-> update();

    return redirect('subcategory')->with('status','Subcategory Updated Successfully');


}
    public function delete($id) {
    $scategory = subcategory::find($id);
    $scategory-> status = '3'; //* 3->Deleted Records
    $scategory->update();
    return redirect()->back()->with('status','Subcategory Deleted Successfully');

}

    public function deletedrecords(){
    $scategory = subcategory::where('status','3')->get();
    return view ('admin.collection.subcategory.deleted')->with('scategory',$scategory);

}
    public function deletedrestore($id) {
    $scategory = subcategory::find($id);
    $scategory-> status = "0"; //* 0-> show, 1->Hide , 2->Delete
    $scategory->update();
    return redirect('subcategory')->with('status','Data Restore');

}

}
