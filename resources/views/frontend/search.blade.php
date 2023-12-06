@extends('layout.frontend')
@section('content')
<div class="container my-5">
<header class="mb-4">
      <h3>New products</h3>
    </header>
    <br>
    @if(session('success'))
            <div class="alert alert-primary alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Primary!</strong> {{ session('success') }}
            </div>
        @endif
    <div class="row">
        @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
            <a href="{{url('/show/'.$product->id)}}">
            <img src="img/{{$product->image}}" width="200px" height="200px" alt=""></a>
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-outline-primary btn-block text-center shadow-0 me-1" role="button">Add to cart</a></p>
                    <p class="btn-holder"><a href="#" class="btn btn-primary btn-block text-center shadow-0 me-1" role="button">Buy now</a></p>
                    <p class="btn-holder"><a href="#!" class="btn btn-light border px-2 pt-2 icon-hover shadow-0 me-1"><i class="fas fa-heart fa-lg text-outline-danger px-1"></i></a></p>   
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    {{ $products->withQueryString()->links('pagination::bootstrap-5');}}
@endsection