<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
   <!-- CSS only -->

</head>
<body>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
   <!-- CSS only -->
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
         
         
        </div>
    
    </nav>
  
    <div class="container mt-5">
  
      <div class="col-lg-12">
    
          <div class="row">
              
              <div class="col-lg-6 mt-5">
                  <div class="card">
                      <a href="" class=""><img src="{{asset("products/".$product->image)}}" alt="" class="card-img-top" height="200px"></a>
                      <h3 class="text-center"  style="background-color: #E3000E;color:white;" >{{$product->title}}</h3>
                      <h3 class="text-center">₹{{$product->price}}</h3>
                
                      <form class="d-flex justify-content-left mx-auto" action="{{route('addCart',['id'=>$product->id])}}" method="POST">
                        @csrf
                          <!-- Default input -->
                          <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
                          <button class="btn btn-primary btn-md my-0 p" style="background-color: #E3000E" type="submit">Add to cart
                              <i class="fas fa-shopping-cart ml-1"></i>
                          </button>
            
                      </form>
  
                  </div>
              </div>
          </div>
      </div>
    </div>
     <div class="container">
        <!--Grid column-->
        <div class="row">
          <div class="col-12">
              <h6>Related Products ({{$d->count()}})</h6>
          </div>
      <div class="col-12 mt-3">
          <div class="row">
              @foreach($d as $products)
              <div class="col-3 mb-2">
                  <div class="card">
                      <img src="{{asset('products/'.$products->image)}}" class="card-img-top" style="object-fit:cover;height:340px">
                 
                      <div class="card-body">
                        
                          <h4 class="text-center"> {{$products->title}}</h4>
                          <a href="{{route('productview',['id'=>$products->id])}}" class="nav-link stretched-link"></a>

                      </div>
                  </div>
              </div>
              @endforeach

          </div>
      </div>
      </div>
    
  </div>
   </div>

       
</body>
</html>