@extends('layouts.app')

@section('content')
  <hr>
  @foreach($news as $n)

    <h1>
      <a href="{{route('news', $n->id)}}">{{ $n->title }}</a>
    </h1>

    <p>
      <em>
        {{ $n->created_at->diffForHumans() }}
      </em>
    </p>

    <p>
      {{ str_limit(strip_tags($n->text), 55, '') }}
        @if (strlen(strip_tags($n->text)) > 55)
          <br>
          <a href="{{route('news', $n->id)}}" class="btn btn-primary btn-sm">Read More</a>
        @endif
    </p>

  @endforeach
@endsection
