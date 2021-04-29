@extends('product.layout')
@section('content')
<a href="{{route('products.index')}}"> Home</a>
<div class="card text-white bg-success mb-3" style="max-width: 180rem;">

    <div class="card-header"> {{$product->name}}</div>
    <div class="card-body">
      <h5 class="card-title">Product name : {{$product->name}}</h5>
      <p class="card-text">Product price : {{$product->price}} LE</p>
      <p class="card-text">Product detail : {{$product->detail}} </p>
    </div>
</div>


    
@endsection