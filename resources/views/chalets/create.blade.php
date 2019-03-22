@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Add new chalet') }}</div>
        <div class="card-body">
                  @if($errors->all())
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </div>
                  @endif
                  <form action="{{route('chalets.store')}}" method="post">
                    @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">{{ __('Title') }}</label>
                    <input type="title" class="form-control" id="title" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">{{ __('Description') }}</label>
                  <textarea class="form-control" name="description" id="inputAddress"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputAddress">{{ __('Address') }} </label>
                  <input type="text" class="form-control" name="address" id="Address" placeholder="1234 Main St">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">{{ __('City') }}</label>
                    <select class="form-control" id="inputCity">
                      <option selected>Choose...</option>
                      <option></option>
                      <option></option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputDistrict">{{ __('District') }}</label>
                    <select id="inputDistrict" class="form-control">
                      <option selected>Choose...</option>
                      <option>...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>
      
@endsection

