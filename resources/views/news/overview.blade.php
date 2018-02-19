@extends('layouts.app')

@section('content')
  <hr>
  @foreach($news as $n)
    <div class="row mb-5">
      <div class="col-md-8">
        <a href="{{route('news', $n->id)}}">
          <img src="{{ asset('uploads/' . $n->news_thumbnail)}}" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4">
        <h1>
          <a href="{{route('news', $n->id)}}">{{ $n->news_title }}</a>
        </h1>

        <p>
          <em>
            {{ $n->created_at->diffForHumans() }}
          </em>
        </p>

        <p>{{ str_limit(strip_tags($n->news_content), 55, '') }}</p>
      </div>
    </div>

  @endforeach
@endsection
