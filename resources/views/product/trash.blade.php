@extends('product.layout')
@section('content')
<div class="container">
  <a href="{{route('products.index')}}" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">Home</a>
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
                    
                    <a href="{{route('backfromTrash',$item->id)}}" class="btn btn-primary">Restore</a>
                    <a href="{{route('forceDelete',$item->id)}}" class="btn btn-primary">Force Delete</a>

                  </div>
                   
                </td>
              </tr>
              @endforeach
 
          </tbody>
      </table>
</div>
    
@endsection