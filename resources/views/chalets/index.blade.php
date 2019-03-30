@extends('dashboard')
@section('icontent')
  <h3>
    {{-- @auth --}}
       <a href="{{ route('chalets.create') }}" class="btn btn-success">إضافة إستراحة جديدة </a>
    {{-- @endauth --}}
    </h3>
  @foreach($chalets as $chalet)
  <div class="card mt-4">
    <div class="card-body">
      <h2>
        <a href="{{route('chalets.show', $chalet->id)}}">
          {{$chalet->title}}
        </a>
      </h2> 
      <h7>{{ $chalet->description }}</h7>
        <a href="{{route('chalets.edit', $chalet->id)}}" class="btn btn-info">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this chalet?')" class="d-inline-block" method="post" action="{{route('chalets.destroy', $chalet->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  @endforeach
  <div class="mt-4">
    {{$chalets->links()}}
  </div>

@endsection
