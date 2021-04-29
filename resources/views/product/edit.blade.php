@extends('product.layout')
@section('content')
<a href="{{route('products.index')}}"> Home</a> 
<div class="card" style="width: 18rem;">
 
    <div class="card-body" style="color: red">
      
      <p class="card-text">product name :{{$product->name}}</p>
      
    </div>
  </div>
<form action="{{route('products.update',$product->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product name</label>
      <input type="string" class="form-control" value="{{$product->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
      
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Product price</label>
      <input type="number" class="form-control" value="{{$product->price}}" id="exampleInputPassword1" name="price">
    </div>
    <div class="mb-3">
        <label for="exampleInputDetail1" class="form-label">Product detail</label>
        <textarea class="form-control" id="exampleInputPassword1"  name="detail" rows="3">
          {!! $product->detail !!}
        </textarea>
      </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection