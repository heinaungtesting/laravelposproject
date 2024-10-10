<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    //category list page
    public function list(){
        $category=Category::orderBy('created_at')->paginate(5);
        return view('admin.category.list',compact('category'));
    }
    function created(Request $req){
    $this->check($req);
    Category::create([
        'name'=>$req->categoryname
    ]);
    Alert::success('Category created','Category created successfully');
    return back();
    }
    function deleted($id){
        Category::where('id',$id)->delete();
        Alert::success('Category deleted','Category deleted successfully');
        return back();
    }
    function updated($id){
 $category=Category::where('id',$id)->first();
 return view('admin.category.update',compact('category'));
    }
    function edit($id,Request $req){
$this->check($req);
Category::where('id',$id)->update([
 'name'=>$req->categoryname,
 'updated_at'=>Carbon::now()

]);
Alert::success('Category Edited','Category edited successfully');
return to_route('categorylist');
    }
    private function check($req){
        $req->validate([
            'categoryname'=>'required',

            ]);
    }
}
