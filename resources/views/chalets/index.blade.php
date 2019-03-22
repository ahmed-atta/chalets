@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('All Attributes') }}</div>
        <div class="card-body">

  <h3>
    {{-- @auth --}}
       <a href="{{ route('attributes.create') }}" class="btn btn-success">Create Attribute</a>
    {{-- @endauth --}}
    </h3>
  @foreach($attributes as $attribute)
  <div class="card mt-4">
    <div class="card-body">
      <h2>
        <a href="{{route('attributes.show', $attribute->id)}}">
          {{$attribute->name}}
        </a>
      </h2> 
      <h7>{{ $attribute->description }}</h7>
        <a href="{{route('attributes.edit', $attribute->id)}}" class="btn btn-info">Edit</a>
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

 </div>
      </div>
    </div>
  </div>
</div>


@endsection
