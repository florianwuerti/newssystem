@extends('layouts.app')

@section('content')
  <hr>


  <table class="table table-light">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">User</th>
        <th scope="col">Created_at</th>
      </tr>
    </thead>
    <tbody>
    @foreach($news as $n)
      <tr>
        <th scope="row">{{$n->id}}</th>
        <td><a href="/admin/news/edit/{{$n->id}}">{{$n->news_title}}</a></td>
        <td>{{ $n->news_author }}</td>
        <td>Veröffentlicht <br> {{ Carbon\Carbon::parse($n->created_at)->toFormattedDateString() }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
