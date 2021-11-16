<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    public function index()
    {
        return view("admin.category.categories",["categories"=>Category::all()]);
    }

   
    public function create()
    {
        $data["main_cat"] = Category::where("parent_id",Null)->get();
        return view("admin.category.insertCategory",$data);  
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'cat_title' => 'required',
           
  
        ]); 
        $file = $request->img->getClientOriginalName();
        $request->img->move(public_path("image"),$file);
        $cat = new Category() ;
        $cat->cat_title = $request->cat_title;
        $cat->description = $request->description;
        $cat->img = $file;
        $cat->pata = $request->pata;
        $cat->parent_id = $request->input("parent_id",Null);
        $cat->save();
        return redirect()->route('category.index'); 
    }

   
    public function show(Category $category)
    {
      
    }

  
    public function edit($id)
    {
        return view('admin.category.editCategory',["category"=>Category::find($id),
        "main_cat" => Category::where("parent_id",Null)->get()
    ]);
       
    }

    
    public function update(Request $request,$id)
    {
        $request->validate([
            'cat_title' => 'required',
           
  
        ]); 
        $file = $request->img->getClientOriginalName();
        $request->img->move(public_path("image"),$file);
        $cat =  Category::find($id) ;
        $cat->cat_title = $request->cat_title;
        $cat->description = $request->description;
        $cat->img = $file;
        $cat->pata = $request->pata;
        $cat->parent_id = $request->input("parent_id",Null);
        $cat->save();
        return redirect()->route('category.index'); 
        
    }

   
    public function destroy( $id)
    {
        $cat = Category::find($id);
      $cat->delete();
      return redirect()->back();
    }
}
