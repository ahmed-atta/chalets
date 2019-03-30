@extends('dashboard')
@section('icontent')


  <h3>
       <a href="{{ route('attributes.create') }}" class="btn btn-success">إضافة ميزة جديدة</a>
    </h3>
  @foreach($attributes as $attribute)
  <div class="card mt-4">
    <div class="card-body">
      <h2>
        <!-- a href="{{route('attributes.show', $attribute->id)}}" -->
          {{$attribute->name}}
      </h2> 
      <h7>{{ $attribute->description }}</h7>
        <!-- a href="{{route('attributes.edit', $attribute->id)}}" class="btn btn-info">Edit</a -->
        <form onsubmit="return confirm('Are you sure you want to delete this attribute?')" class="d-inline-block" method="post" action="{{route('attributes.destroy', $attribute->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      

    </div>
  </div>
  @endforeach
  <div class="mt-4">
    {{$attributes->links()}}
  </div>


@endsection
