@extends('admin.base')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{route('category.update',["category"=>$category->id])}}" enctype="multipart/form-data" method="POST">
                @method("put")
               @csrf
               <div class="mb-3">
                   <label for="">parent_id</label>
                   <select type="text" name="parent_id" class="form-select">
                       <option value="" >Main Category</option>
                       @foreach($main_cat as $cat)
                       <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                       @endforeach
                   </select>
                 
               </div>
               <div class="mb-3">
                <label for="">cat_title</label>
               <input type="text" class="form-control" name="cat_title" value="{{$category->cat_title}}">
            </div>
            <div class="mb-3">
                <label for="">description</label>
                 <textarea name="description"  cols="30" rows="10" class="form-control" value="{{$category->description}}"></textarea>
            </div>
            <div class="mb-3">
                <label for="">img</label>
               <input type="file" class="form-control" name="img" value="{{$category->img}}">
            </div>
            <div class="mb-3">
                <label for="">pata</label>
               <input type="text" class="form-control" name="pata" value="{{$category->pata}}">
            </div>
           
            <div class="mb-3">
                <input type="submit" class="form-control w-100" style="background-color:#E3000E">
            </div>
            </form>
        </div>
    </div>
</div>
    
@endsection