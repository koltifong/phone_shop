@extends('layout.frontend')
@section('content')
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="/img/{{$product->image}}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">ID: {{$product->id}}</div>
                <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                <div class="fs-5 mb-5">
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
@endsection