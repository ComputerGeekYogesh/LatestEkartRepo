<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\group;

class GroupController extends Controller
{
    public function index(){
                 $group = group::where('status','!=','2')->get();      //*this defines group
                return view ('admin.collection.group.index')->with('group',$group);     //*with method for using $group in index file for models


    }
    public function viewpage(){
        return view ('admin.collection.group.create');
    }

    public function store(Request $request){
        $group = new group();
        $group-> name = $request->input ('name');
        $group-> url = $request->input ('url');
        $group-> description = $request->input ('description');
        if($request->input ('status')== true){
            $group->status = "1";
        }
        else{
            $group->status = "0";
        }
        $group->save();
        return redirect()->back()->with('status','Group Data Added Successfully');
    }
        public function edit ($id){
            $group = group::find($id);
            return view('admin.collection.group.edit')->with('group',$group);
        }

        public function update(Request $request, $id) {
            $group = group::find($id);
            $group->name = $request->input('name');
            $group->url = $request->input ('url');
            $group->description = $request->input('description');
            $group->status = $request->input('status') == true ? '1': '0';
            $group->update();
             return redirect('group')->with('status','Group Data UPDATED Successfully');
        }
            public function delete($id) {
            $group = group::find($id);
            $group-> status = "2"; //* 0-> show, 1->Hide , 2->Delete
            $group->update();
            return redirect()->back()->with('status','Data deleted');

}
        public function deletedrecords(){
        $group = group::where('status','2')->get();
        return view ('admin.collection.group.deleted')->with('group',$group);

}
    public function deletedrestore($id) {
    $group = group::find($id);
    $group-> status = "0"; //* 0-> show, 1->Hide , 2->Delete
    $group->update();
    return redirect('group')->with('status','Data Restore');

}


}
