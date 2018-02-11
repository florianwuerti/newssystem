@extends('layouts.app')

@section('content')
  <hr>
  @foreach($news as $n)

    <a href="{{route('news', $n->id)}}">
      <img src="{{ asset('uploads/' . $n->post_thumbnail)}}" alt="">
    </a>
    <h1>
      <a href="{{route('news', $n->id)}}">{{ $n->title }}</a>
    </h1>

    <p>
      <em>
        {{ $n->created_at->diffForHumans() }}
      </em>
    </p>

    <p>{{ str_limit(strip_tags($n->text), 55, '') }}</p>

  @endforeach
@endsection
