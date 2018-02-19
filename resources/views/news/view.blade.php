@extends('layouts.app')

@section('content')

  <img src="{{ asset('uploads/' . $news->news_thumbnail)}}" alt="" class="img-fluid mt-5">
  <hr>
  <h1>{{ $news->news_title }}</h1>
  <hr>
  <p>
      <em>{{ $news->created_at->diffForHumans() }}</em>
  </p>
  <div class="row">
    <div class="col-md-8">
      <p>
        {!! nl2br(e($news->news_content)) !!}
      </p>
    </div>
    <div class="col-md-4">
      <p>
          <strong>Kategorien:</strong>
          <ul>
              @foreach($news->categories as $c)
                  <li><a href="/category/{{ $c->slug }}">{{ $c->name }}</a></li>
              @endforeach
          </ul>
      </p>
      <p>
          <i>Geschrieben von {{ $user->name }}</i>
      </p>
    </div>
  </div>

  <a href="/" class="btn-primary btn button">Zurück</a>

@endsection
