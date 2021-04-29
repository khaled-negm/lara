@extends('product.layout')
@section('content')
<div class="container">
  <a href="{{route('products.index')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Home</a>
  <a href="{{route('trash')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Trash</a>
  <a href="{{route('products.create')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Create</a>
  @if ($message=Session::get('success'))
  <div class="alert alert-primary" role="alert">
    {{$message}}
  </div>
  @endif
 </div>
  <div class="container">
    <table class="table table-success table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">price</th>
              <th scope="col">detail</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              @php
                  $i=0;
              @endphp
              @foreach ($products as $item)
              <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}} LE</td>
                <td>{{$item->detail}}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{route('products.edit',$item->id)}}" class="btn btn-primary active" aria-current="page">Edit</a>
                    <a href="{{route('products.show',$item->id)}}" class="btn btn-primary">Show</a>
                    <a href="{{route('delete',$item->id)}}" class="btn btn-primary">Delete</a>
                  </div>
                   
                </td>
              </tr>
              @endforeach
 
          </tbody>
      </table>
</div>
    
@endsection