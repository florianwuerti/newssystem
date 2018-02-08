@extends('layouts.app')

@section('content')

  <hr>
  <h1>{{ $news->title }}</h1>
  <hr>
  <p>
      <em>{{ $news->created_at->diffForHumans() }}</em>
  </p>
  <div class="row">
    <div class="col-md-8">
      <p>
        {!! nl2br(e($news->text)) !!}
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
