@extends('product.layout')
@section('content')
<a href="{{route('products.index')}}"> Home</a>
<form action="{{route('products.store')}}" method="POST">
    @csrf
    @method('post')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product name</label>
      <input type="string" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Product price</label>
      <input type="number" class="form-control" id="exampleInputPassword1" name="price">
    </div>
    <div class="mb-3">
        <label for="exampleInputDetail1" class="form-label">Product detail</label>
        <textarea class="form-control" id="exampleInputPassword1" name="detail" rows="3"></textarea>
      </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection