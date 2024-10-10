<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    function product(){
        $category=Category::get();
        return view('admin.product.create',compact('category'));
    }
    function create(Request $req){
        $this->checkproduct($req,'create');
        $product=$this->getProductData($req);
        if($req->hasFile('image')){
            $filename=uniqid().$req->file('image')->getClientOriginalName();
            $req->file('image')->move(public_path().'/product/',$filename);
            $product['image']=$filename;

        }
        Product::create($product);
        Alert::success('Product Created','Product created successfully');
        return back();


    }
    function productlist($amt='default'){
        $product=Product::select('categories.name as category_name','products.id','products.name','products.image','products.price','products.category_id','products.stock',)
        ->leftJoin('categories','products.category_id','categories.id')
        ->when(request('key'),function ($query){
            $query->whereAny(['products.name','categories.name'],'like','%'.request('key').'%');
        });
        if($amt !='default'){
            $product=$product->where('stock','<=',3);
        }


       $product=$product->orderBy('products.created_at','desc')->get();

        return view('admin.product.list',compact('product'));
    }
    function productupdatepage($id){
        $category=Category::get();
        $product=Product::where('id',$id)->first();
        return view('admin.product.edit',compact('product'));
    }
    function productupdate(Request $req,$id){
        $this->checkproduct($req,'update');
        $product=$this->getProductData($req);
        if($req->hasFile('image')){
            if(file_exists(public_path('product/'.$req->oldphoto))){
                unlink(public_path('product/'.$req->oldphoto));}
                $filename=uniqid().$req->file('image')->getClientOriginalName();
                $req->file('image')->move(public_path().'/product/',$filename);+
                $product['image']-$filename;


        }else{
            $product['image']=$req->oldphoto;
        }
        Product::where('id',$req->productid)->update($product);
        Alert::success('Product Updated','Product updated successfully');
        return to_route('productlist');
            }
    //request product data
    private function getProductData($req){
        return [
            'name'=>$req->name,
            'price'=>$req->price,
            'description'=>$req->description,
            'stock'=>$req->stock,
            'category_id'=>$req->categoryid,
        ];
    }
    private function checkproduct($req,$action){
       $rule=['name'=>'required|unique:products,name,'.$req->product,
            'price'=>'required|numeric|min:1',

            'description'=>'required|max:2000',
            'categoryid'=>'required',
            'stock'=>'required|numeric|max:999'];
            $rule['image']=$action=='create'?'required|mimes:jpeg,png,jpg|max:2048':'mimes:jpeg,png,jpg|max:2048';
        $req->validate($rule);




    }
}
