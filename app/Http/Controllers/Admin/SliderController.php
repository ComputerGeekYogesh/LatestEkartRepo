<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    public function index(){
        $slider = Slider::all();
       return view ('admin.slider.index',compact('slider'));

}

public function create(){
   return view ('admin.slider.create');

}

public function store(Request $request){
    $slider = new Slider();
    $slider->heading = $request->input ('heading');
    $slider->description = $request->input ('description');
    $slider->link  = $request->input ('link');
    $slider->link_name = $request->input ('link_name');
    $slider->description = $request->input ('description');
    $slider->link  = $request->input ('link');
    if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . '.' . $extension;
            $request->image->move(public_path('uploads/slider'), $image);
            $path = url('uploads/slider', $image);
            $slider->image = $path;
        }

    if($request->input ('status') == true){
        $slider->status = "1";
    }
    else{
        $slider->status = "0";
    }
    $slider->save();
    return redirect()->back()->with('status','Slider Added Successfully');
}

public function edit($id){
    $slider = Slider::find($id);
    return view ('admin.slider.edit',compact('slider'));
 
 }

 
public function update(Request $request, $id){

    $slider = Slider::find($id);
    $slider->heading = $request->input ('heading');
    $slider->description = $request->input ('description');
    $slider->link  = $request->input ('link');
    $slider->link_name = $request->input ('link_name');
    $slider->description = $request->input ('description');
    $slider->link  = $request->input ('link');
    if ($request->hasfile('image'))
        {
            $des = 'uploads/slider/'.  $slider->image;
            if(File::exists($des)) {
                File::delete($des);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . '.' . $extension;
            $request->image->move(public_path('uploads/slider'), $image);
            $path = url('uploads/slider', $image);
            $slider->image = $path;
        }

    if($request->input ('status') == true){
        $slider->status = "1";
    }
    else{
        $slider->status = "0";
    }
    $slider->save();
    return redirect()->back()->with('status','Slider Added Successfully');
 
 }



}
