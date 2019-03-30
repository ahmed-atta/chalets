@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">أفضل العروض </h1>
      <p class="lead text-muted">Something short and leading about the collection below .</p>
      <p>
        <a href="#" class="btn btn-primary my-2">عرض التفاصيل</a>
        <a href="#" class="btn btn-secondary my-2">حجز</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">

        @foreach($chalets as $chalet)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm text-right">
            <title>{{ $chalet->title }}</title>
                  <img src="{{ asset('/')}}{{ $chalet->media[0]->path}}/{{ $chalet->media[0]->filename }}" height="225"/>
                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $chalet->title }}</text></svg>
            <div class="card-body">
              <p class="card-text">{{ $chalet->description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('details',['id'=>$chalet->id]) }}" class="btn btn-sm btn-outline-secondary">عرض التفاصيل</button>
                  <a href="{{ route('details',['id'=>$chalet->id]) }}"  class="btn btn-sm btn-outline-secondary">حجز </a>
                </div>
                <small class="text-muted">
                  @if(isset($chalet->prices[0]->day_price)) 
                    {{  $chalet->prices[0]->day_price }}
                  @endif
                </small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

       

    


      </div>
    </div>
  </div>

@endsection