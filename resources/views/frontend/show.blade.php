<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Shop</title>
    <link rel="icon" type="image/x-icon" href="{{asset('public/favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('css/fe.css')}}" rel="stylesheet" />
    <style>
    .checked {
        color: orange;
    }
    </style>
</head>
<body>
    <!--Main Navigation-->
<header>
  <!-- Jumbotron -->
  <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row gy-3">
        <!-- Left elements -->
        <div class="col-lg-2 col-sm-4 col-4">
          <a href="{{url('/')}}" class="float-start">
            <img src="https://www.logolynx.com/images/logolynx/2c/2cd2908f2731f8087e3958b8403bd6f5.png" height="35" />
          </a>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <div class="order-lg-last col-lg-5 col-sm-8 col-8">
          <div class="d-flex float-end">
            <a href="{{url('/login')}}" class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center"> <i class="fas fa-user-alt m-1 me-md-2"></i><p class="d-none d-md-block mb-0">Sign in</p> </a>
            <a href="{{ url('/cart') }}" class="border rounded py-1 px-3 nav-link d-flex align-items-center"> <i class="fas fa-shopping-cart m-1 me-md-2"></i><p class="d-none d-md-block mb-0">My cart</p> </a>
          </div>
        </div>
        <!-- Center elements -->

        <!-- Right elements -->
        <div class="col-lg-5 col-md-12 col-12">
        {{ Form::open(array('url'=>'/search','method'=>'get')) }}
        <div class="input-group float-center">
            {{ Form::text('keyword',$keyword ?? '', array('placeholder'=>'Search', 'class'=>'form-control')) }}
            <span class="input-group-btn">
                {{ Form::submit('search',array('class'=>'btn btn-primary')) }}
            </span>
        </div>
        {{ Form::close() }}
    </div>
        <!-- Right elements -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container justify-content-center justify-content-md-between">
      <!-- Toggle button -->
      <button
              class="navbar-toggler border py-2 text-dark"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarLeftAlignExample"
              aria-controls="navbarLeftAlignExample"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{url('/frontend')}}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{url('/list')}}">Products</a>
          </li>
          <!-- Contact form -->
          <li><a class="nav-link text-dark" href="{{url('/contact')}}">Contact form</a></li>
        </ul>
        <!-- Left links -->
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!-- Products -->
<section>
<div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="/img/{{$product->image}}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">ID: {{$product->id}}</div>
                <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                <div class="fs-5 mb-5">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                    <span>${{$product->price}}</span>
                </div>
                <p class="lead">
                    {{$product->description}}
                </p>
                <div class="d-flex">
                <input class="shadow-0 me-1" type="number" id="quantity" name="quantity" min="1" max="5" value="1"> 
                    <button class="btn btn-outline-primary flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Products -->

<!-- Feature -->
<section class="mt-5" style="background-color: #f5f5f5;">
  <div class="container text-dark pt-3">
    <header class="pt-4 pb-3">
      <h3>Why choose us</h3>
    </header>

    <div class="row mb-4">
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-camera-retro fa-2x fa-fw text-primary floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Reasonable prices</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-star fa-2x fa-fw text-primary floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Best quality</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-plane fa-2x fa-fw text-primary floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Worldwide shipping</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-users fa-2x fa-fw text-primary floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Customer satisfaction</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-thumbs-up fa-2x fa-fw text-primary floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Happy customers</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
      <div class="col-lg-4 col-md-6">
        <figure class="d-flex align-items-center mb-4">
          <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
            <i class="fas fa-box fa-2x fa-fw text-primary floating"></i>
          </span>
          <figcaption class="info">
            <h6 class="title">Thousand items</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
          </figcaption>
        </figure>
        <!-- itemside // -->
      </div>
      <!-- col // -->
    </div>
  </div>
  <!-- container end.// -->
</section>
<!-- Footer -->
<footer class="text-center text-lg-start text-muted mt-3" style="background-color: #f5f5f5;">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start pt-4 pb-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-12 col-lg-3 col-sm-12 mb-2">
          <!-- Content -->
          <a href="https://mdbootstrap.com/" target="_blank" class="">
            <img src="https://www.logolynx.com/images/logolynx/2c/2cd2908f2731f8087e3958b8403bd6f5.png" height="35" />
          </a>
          <p class="mt-2 text-dark">
            © 2023 Copyright: MDBootstrap.com
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Store
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">About us</a></li>
            <li><a class="text-muted" href="#">Find store</a></li>
            <li><a class="text-muted" href="#">Categories</a></li>
            <li><a class="text-muted" href="#">Blogs</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Information
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="{{url('/contact')}}">Contact form</a></li>
            <li><a class="text-muted" href="#">Money refund</a></li>
            <li><a class="text-muted" href="#">Shipping info</a></li>
            <li><a class="text-muted" href="#">Refunds</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Support
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">Help center</a></li>
            <li><a class="text-muted" href="#">Documents</a></li>
            <li><a class="text-muted" href="#">Account restore</a></li>
            <li><a class="text-muted" href="#">My orders</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-12 col-sm-12 col-lg-3">
          <!-- Links -->
          <h6 class="text-uppercase text-dark fw-bold mb-2">Newsletter</h6>
          <p class="text-muted">Stay in touch with latest updates about our products and offers</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
            <button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
              Join
            </button>
          </div>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <div class="">
    <div class="container">
      <div class="d-flex justify-content-between py-4 border-top">
        <!--- payment --->
        <div>
          <i class="fab fa-lg fa-cc-visa text-dark"></i>
          <i class="fab fa-lg fa-cc-amex text-dark"></i>
          <i class="fab fa-lg fa-cc-mastercard text-dark"></i>
          <i class="fab fa-lg fa-cc-paypal text-dark"></i>
        </div>
        <!--- payment --->

        <!--- language selector --->
        <div class="dropdown dropup">
          <a class="dropdown-toggle text-dark" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
            <li>
              <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i></a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
            </li>
          </ul>
        </div>
        <!--- language selector --->
      </div>
    </div>
  </div>
</footer>
<!-- Footer -->
</body>
</html>
