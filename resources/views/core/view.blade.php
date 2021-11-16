<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   

</head>
<body>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<script src="https://kit.fontawesome.com/26d4a64054.js" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar " style="background-color: #E3000E">
    <div class="container">
        <a class="navbar-brand waves-effect" href="" target="_blank">
            <strong class="white-text">Restaurant</strong>
          </a>
          <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <form class="form-inline mt-2" action="{{route('searchpro')}}" method="GET">
                    <div class="d-flex my-0">
                      <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search" size="60">
                      <input type="submit" class="btn btn-success" style="background-color: #E3000E">
                    </div>
                  </form>  
              </li>
          </ul>
         
        </div>
    
    </nav>
    <div class="container-fluid text-center">
   
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
    <div class="container mt-5">
      <h2 class="text-center">Recommended </h2>
      <div class="col-lg-12">
    
          <div class="row">
              @foreach($product as $pro)
              
              <div class="col-lg-4 mt-5">
                  <div class="card">
                      <a href="{{route('productview',['id'=>$pro->id])}}" class=""><img src="{{asset("products/".$pro->image)}}" alt="" class="card-img-top" height="200px"></a>
                      <h3 class="text-center">{{$pro->title}}</h3>
                      <h3 class="text-center" style="background-color: #E3000E;color:white;">₹{{$pro->price}}</h3>
                
                    <div class="card-footer text-inline">
                      @php
                      $a = $pro->id;
                  @endphp
             
                   <?php
                   $s = $pro->like;
                   ?>
                   
                   @for($i =1;$i<=$s;$i++)
                 <i class="fa fa-star p-0 m-0 inline" aria-hidden="true" style="color:#ffff19"></i>
                 
                   @endfor
                    </div>
                  </div>
              </div>
           @endforeach
          </div>
      </div>
   
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>   
</body>
</html>