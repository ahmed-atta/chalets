@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Add new attribute') }}</div>
        <div class="card-body">
                  @if($errors->all())
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </div>
                  @endif
                  <form action="{{route('attributes.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">{{ __('Name') }}</label>
                      <input type="text" name="name" id="name" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label for="description">{{ __('Description') }}</label>
                      <input type="text" name="description" id="description" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-outline-info">{{ __('Submit') }}</button>
                    </div>
                  </form>
        </div>
      </div>
    </div>
  </div>
</div>
      
@endsection

