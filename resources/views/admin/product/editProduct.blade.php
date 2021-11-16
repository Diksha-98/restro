@extends("admin.base")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
        <div class="card">
            <div class="card-body shadow">
            <form action="{{route('product.update',['product'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                <label for="">title</label>
                <input type="text" class="form-control" name="title" value="{{$product->title}}"> 
                @error('title')
                <p class="text-danger small">{{$message}}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="">price</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}"> 
                    @error('price')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">discount price</label>
                        <input type="text" class="form-control" name="discount_price" value="{{$product->discount_price}}"> 
                        @error('discount_price')
                        <p class="text-danger small">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">category</label>
                            <select type="text" name="category_id" class="form-control">
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                                @endforeach
                            </select>

                     </div>
                    <div class="mb-3">
                        <label for="">image</label>
                        <input type="file" class="form-control" name="image">

                    </div>
                    <div class="mb-3">
                        <label for="">image1</label>
                        <input type="file" class="form-control" name="image1">

                    </div>
                        <div class="mb-3">
                            <label for="">description</label>
                             <textarea name="decr"  cols="30" rows="10" class="form-control" value{{$product->decr}}></textarea>
                             @error('decr')
                             <p class="text-danger small">{{$message}}</p>   
                             @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">like</label>
                               
                                <div class="rate" value{{$product->like}}>
                                    <input type="radio" id="star5" name="like" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="like" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="like" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="like" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="like" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                  </div>
                             </div>
                             <div class="mb-3">
                                 <input type="submit" class="form-control w-100" style="background-color:#E3000E ">
                             </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
    
@endsection