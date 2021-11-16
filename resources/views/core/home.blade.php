@extends('core.base')
@section('content')
<body>
    <div class="container-fluid text-center" style="background-image: url('pic/food.webp'); min-height: 60vh; background-position: center;
    background-size: cover;min-height: 60vh; background-position: center float-left;
position: relative;">
   
    <h2 class="text-center" style="color: white;">Find the best restaurants, cafés and bars in India</h2>
    <h4 class="text-center" style="color: white;">Popular locations in India
    From swanky upscale restaurants to the cosiest hidden gems serving the most incredible food, Zomato covers it all. Explore menus, and millions of restaurant photos and reviews from users just like you, to find your next great meal.
            Agra Restaurants</</h4>
    </div>
    <div class="container-fluid">
        <h2 class="text-center">Popular locations in India</h2>
        <h5 class="text-center">From swanky upscale restaurants to the cosiest hidden gems serving the most incredible food, Zomato covers it all. Explore menus, and millions of restaurant photos and reviews from users just like you, to find your next great meal.
            Agra Restaurants</h5>
    </div>
    <div class="container-fluid mt-5">
        
            <div class="col-lg-12">
               <div class="row">
                @foreach($categories as $cat)
                <div class="col-lg-4 mt-5" height="200px" >
                    <div class="card shadow" height:200px>
                        <a href="{{route('view',['id'=>$cat->id])}}" class="">  <img src="{{asset("image/".$cat->img)}}" alt="" class="card-img-top" height="200px"></a> 
                       <a href="{{route('view',['id'=>$cat->id])}}"><h5 class="text-center text-dark" style="text-decoration:underline;text-decoration-color:white">{{$cat->cat_title}}</h5></a>
                       <p class="laed text-secondary"><i class="bi bi-geo-alt-fill"></i>{{$cat->pata}}</p>
                       <p class="text-danger"><i class="bi bi-telephone">{{$cat->description}}</i></p>
                    </div>
                </div>
              
                @endforeach
               </div>
            </div>
        </div>
        
                    
        </div>

</body>
    
@endsection