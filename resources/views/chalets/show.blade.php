@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>{{$post->title}}</h2>
    <p class="blog-post-meta"><?=date('M d, Y', strtotime($post->created_at)); ?> by 
            <a href="{{url('/')}}/{{$post->user->id}}">{{ $post->user->name }}</a></p>
  </div>
  <div class="card-body">
    <p>
      {{$post->content}}
    </p>
  </div>
</div>
@stop