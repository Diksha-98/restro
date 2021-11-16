<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item">
                <div class="d-flex my-0">
            <form class="form-inline" action="{{route('search')}}" method="GET">
                <div class="d-flex my-0">
                  <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search" size="60">
                  <input type="submit" class="btn btn-success" style="background-color: #E3000E">
                </div>
              </form>
        </li>

        </ul>
    <div class="collapse-navbar-collapse">
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link waves-effect" href="">Profile</a>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{route('logout')}}">
                @csrf
                <button type="button" class="nav-link  border-0 waves-effect" style="background-color: red" href="{{route('login')}}">Logout</button>
          </form>
            </li>
            @endauth
            @guest
            <li class="nav-item">
              <a class="nav-link waves-effect" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="{{route('register')}}">Register</a>
            </li>
            @endguest
            <li class="nav-item">
              <a class="nav-link waves-effect" href="{{route('cart')}}">
                @if(isset($count))
                <span class="badge red z-depth-1 mr-1"> 
                  {{$count}}
                   </span>
                   @endif
                <i class="fas fa-shopping-cart"></i>
                <span class="clearfix d-none d-sm-inline-block"> Cart </span>
              </a>
            </li>
          </ul>
  
    </div>
</div>
</nav>
@section('content')
          
      @show
      <footer class="page-footer text-center font-small mt-4 wow fadeIn">

       
    
        <hr class="my-4">
    
        <!-- Social icons -->
        <div class="pb-4">
          <a href="https://www.facebook.com/mdbootstrap" target="_blank">
            <i class="fab fa-facebook-f mr-3"></i>
          </a>
    
          <a href="https://twitter.com/MDBootstrap" target="_blank">
            <i class="fab fa-twitter mr-3"></i>
          </a>
    
          <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
            <i class="fab fa-youtube mr-3"></i>
          </a>
    
          <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
            <i class="fab fa-google-plus-g mr-3"></i>
          </a>
    
          <a href="https://dribbble.com/mdbootstrap" target="_blank">
            <i class="fab fa-dribbble mr-3"></i>
          </a>
    
          <a href="https://pinterest.com/mdbootstrap" target="_blank">
            <i class="fab fa-pinterest mr-3"></i>
          </a>
    
          <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
            <i class="fab fa-github mr-3"></i>
          </a>
    
          <a href="http://codepen.io/mdbootstrap/" target="_blank">
            <i class="fab fa-codepen mr-3"></i>
          </a>
        </div>
        <!-- Social icons -->
    
        <!--Copyright-->
        <div class="footer-copyright py-3">
          © 2019 Copyright:
          <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
        </div>
        <!--/.Copyright-->
    
      </footer>
      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>