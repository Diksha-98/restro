@extends('admin.base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <table class="table  table-bordered table-hover">
                <tr>
                    <th>title</th>
                    <th>price</th>
                    <th>diacount_price</th>
                    <th>category_id</th>
                    <th>image</th>
                    <th>image1</th>
                    <th>decr</th>
                    <th>like</th>
                </tr>
               @foreach($products as $pro)
               <tr>
                   <th>{{$pro->title}}</th>
                   <th>{{$pro->price}}</th>
                   <th>{{$pro->discount_price}}</th>
                   <th>{{$pro->category_id}}</th>
                   <th><img src="{{asset("products/$pro->image")}}" width="50px"></th>
                   <th><img src="{{asset("products/$pro->image1")}}" width="50px"></th>
                   <th>{{$pro->decr}}</th>
                   <th>{{$pro->like}}</th>
                   <th class="d-flex">
                    <form class="" action="{{route('product.destroy',['product'=>$pro->id])}}" method="POST">
                        @method("delete")
                        @csrf
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>
                    <a href="{{route('product.edit',["product"=>$pro->id])}}" class="btn btn-success">edit</a>
                   </th>
               </tr>
   
               @endforeach
            </table>
        </div>
    </div>

</div>
    
@endsection