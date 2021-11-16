<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        return view('admin.product.products',['products'=>Product::all()]);
    }

    
    public function create()
    {
        return view('admin.product.insertProduct',[
            "categories"=> Category::all()]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
             'image' => 'required',

        ]);
        $file = $request->image->getClientOriginalName();
        $request->image->move(public_path("products"),$file);
        $file1 = $request->image1->getClientOriginalName();
        $request->image1->move(public_path("products"),$file1);
   
        $p = new Product();
        $p->title = $request->title;
        $p->price = $request->price;
        $p->discount_price = $request->discount_price;
        $p->category_id = $request->category_id;
        $p->decr = $request->decr;
        $p->like = $request->like;
       $p->image = $file;
       $p->image1 = $file1;
        $p->save();
        return redirect()->route("product.index");
    }

    
    public function show( $id)
    {
       
    }

    
    public function edit( $id)
    {
        return view("admin.product.editProduct",[
            'product' => Product::find($id),
            'categories' => Category::all()
        ]);
       
    }

    
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
             'image' => 'required',

        ]);
        $file = $request->image->getClientOriginalName();
        $request->image->move(public_path("products"),$file);
        $file1 = $request->image1->getClientOriginalName();
        $request->image1->move(public_path("products"),$file1);
   
        $p =  Product::find($id);
        $p->title = $request->title;
        $p->price = $request->price;
        $p->discount_price = $request->discount_price;
        $p->category_id = $request->category_id;
        $p->decr = $request->decr;
        $p->like = $request->like;
       $p->image = $file;
       $p->image1 = $file1;
        $p->save();
        return redirect()->route("product.index");
    }

    
    public function destroy($id)
    {
        {
            $p = Product::find($id)->delete();
            return redirect()->back();
            }  
    }
}
