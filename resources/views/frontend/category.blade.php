@extends('layout.frontend')
@section('content')
<div class="container">
    
    <div class="row">
        <br>
        @if (count(array($categories)) > 0)
            <div class="col-md-12">
                <ul class="list-unstyled mb-0">
                    @foreach ($categories as $category)
                    <li>
                        <a href="{{url('/frontend/'.$category->id)}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- <label for="categories">Choose a category:</label>

            <select id="categories">
            @foreach ($categories as $category)
            <option><a href="{{url('/frontend/'.$category->id)}}">{{$category->name}}</a></option>
            </select> 
            @endforeach -->
        @endif
        <br><br><br>
        @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <a href="{{url('/show/'.$product->id)}}">
                    <img src="/img/{{$product->image}}" width="200px" alt="">
                </a>
                
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
    {{-- $products->appends(request()->input())->links(); --}}
    {{ $products->links('pagination::bootstrap-5');}}
</div>
@endsection