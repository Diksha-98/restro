@extends('admin.base')
@section('content')
    <div class="container mt-5">
        <div class="col-lg-8 mx-auto">
        <table class="table table-bordered table-hover">
           <tr>
               <th>id</th>
               <th>parent_id</th>
               <th>cat_title</th>
               <th>img</th>
               <th>pata</th>
             
           </tr>
           @foreach($categories as $category)
           <tr>
               <th>{{$category->id}}</th>
               <th>{{$category->parent_id}}</th>
               <th>{{$category->cat_title}}</th>
               <th><img src="{{asset("image/$category->img")}}" width="50px"></th>
               <th>{{$category->pata}}</th>
               
               <th class="d-flex">
                <form class="" action="{{route('category.destroy',['category'=>$category->id])}}" method="POST">
                    @method("delete")
                    @csrf
                    <input type="submit" class="btn btn-danger" value="delete">
                </form>
                   <a href="{{route('category.edit',['category'=>$category->id])}}" class="btn btn-info">edit</a>
               </th>
           </tr>
           @endforeach
        </table>
        </div>
    </div>
@endsection