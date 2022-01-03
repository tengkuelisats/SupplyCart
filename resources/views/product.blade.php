@extends('layouts.app')

@section('content')
@if(session('success'))
    <script>
        swal("", "{{session('success')}}", "success");
    </script>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Product
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort By:
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ URL::current()}}">All</a>
                                  <a class="dropdown-item" href="{{ route('product','perfume')}}">Perfume</a>
                                  <a class="dropdown-item" href="{{ route('product','fashion')}}">Fashion</a>
                                  <a class="dropdown-item" href="{{ route('product','catfood')}}">Cat Food</a>
                                  <a class="dropdown-item" href="{{ route('product','candles')}}">Candles</a>
                                  <a class="dropdown-item" href="{{ route('product','bbw')}}">Bath & Body Works</a>
                                  <a class="dropdown-item" href="{{ route('product','nenahijab')}}">Nena Hijabs</a>
                                  <a class="dropdown-item" href="{{ route('product','royalcanin')}}">Royal Canin</a>
                                  <a class="dropdown-item" href="{{ route('product','powercat')}}">Power Cat</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($product as $product)
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                        <p class="mb-0"><b>{{$product->name}}</b></p>
                                        <p class="mb-0">{{$product->brand}}</p>
                                        <p class="mb-0">{{$product->category}}</p>
                                        <p class="mb-0"><strong>${{$product->price}}</strong></p>
                                        {{-- <p class="btn-holder"><a href="" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p> --}}
                                        <p class="btn-holder"><a href="{{ route('addToCart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
