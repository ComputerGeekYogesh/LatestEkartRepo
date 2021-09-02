<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\group;
use App\Models\Models\category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category = category::where ('status','!=','3')->get();
        return view ('admin.collection.category.index')->with('category',$category);
    }
    public function create(){
        $group = group::where('status','!=','3')->get();     //* 3-> Deleted Data
        return view ('admin.collection.category.create')->with('group',$group);
    }
    public function store(Request $request){
        $category = new category();
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->url = $request->input('url');
        $category->description= $request->input('description');
       // $category->image = $request->input('category_img');
        if ($request ->hasfile('category_img'))
        {
            $image_file = $request->file('category_img');
            $img_extension = $image_file->getClientOriginalExtension();  //*getting image extension
            $img_filename = time() . '-'. $img_extension;
            $image_file->move('uploads/categoryimage/',$img_filename);
            $category->image = $img_filename;


        }
        //  $category->icon = $request->input('category_icon');
        if ($request ->hasfile('category_icon'))
        {
            $icon_file = $request->file('category_icon');
            $icon_extension = $icon_file->getClientOriginalExtension();  //*getting icon extension
            $icon_filename = time() . '-'. $icon_extension;
            $icon_file->move('uploads/categoryicon/',$icon_filename);
            $category->icon = $icon_filename;


        }



        $category->status= $request->input('status') == true ? '1':'0';   //* 0->show | 1->hide
        $category-> save();

        return redirect()->back()->with('status','Category Added Successfully');
    }

    public function edit($id){
        $group = group::where ('status','!=','3')->get();  //* 3= deleted data's
        $category = category::find($id);
        return view('admin.collection.category.edit')->with('group',$group)->with('category',$category);
    }

    public function update(Request $request, $id){
        $category =  category::find($id);
        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->url = $request->input('url');
        $category->description= $request->input('description');

        if ($request ->hasfile('category_img'))
        {
             $filepath_image= 'uploads/categoryimage/'.$category->image;
            if (File::exists($filepath_image)){
                File::delete($filepath_image);
            }
            $image_file = $request->file('category_img');
            $img_extension = $image_file->getClientOriginalExtension();  //*getting image extension
            $img_filename = time() . '-'. $img_extension;
            $image_file->move('uploads/categoryimage/',$img_filename);
            $category->image = $img_filename;


        }

        if ($request ->hasfile('category_icon'))
        {
            $filepath_icon= 'uploads/categoryicon/'.$category->icon;
            if (File::exists($filepath_icon)){
                File::delete($filepath_icon);
            }
            $icon_file = $request->file('category_icon');
            $icon_extension = $icon_file->getClientOriginalExtension();  //*getting icon extension
            $icon_filename = time() . '-'. $icon_extension;
            $icon_file->move('uploads/categoryicon/',$icon_filename);
            $category->icon = $icon_filename;


        }



        $category->status= $request->input('status') == true ? '1':'0';   //* 0->show | 1->hide
        $category-> update();

        return redirect('category')->with('status','Category Updated Successfully');
    }
    public function delete($id) {
        $category = category::find($id);
        $category-> status = '3'; //* 3->Deleted Records
        $category->update();
        return redirect()->back()->with('status','Category Deleted Successfully');

}
    public function deletedrecords(){
    $category = category::where('status','3')->get();
    return view ('admin.collection.category.deleted')->with('category',$category);

}
    public function deletedrestore($id) {
    $category = category::find($id);
    $category-> status = "0"; //* 0-> show, 1->Hide , 2->Delete
    $category->update();
    return redirect('category')->with('status','Data Restore');

}

}
