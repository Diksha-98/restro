@extends('admin.base')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
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
               <input type="text" class="form-control" name="cat_title">
            </div>
            <div class="mb-3">
                <label for="">description</label>
                 <textarea name="description"  cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="">img</label>
               <input type="file" class="form-control" name="img">
            </div>
            <div class="mb-3">
                <label for="">pata</label>
               <input type="text" class="form-control" name="pata">
            </div>
           
            <div class="mb-3">
                <input type="submit" class="btn  w-100" style="background-color: #E3000E;">
            </div>
            </form>
        </div>
    </div>
</div>
    
@endsection