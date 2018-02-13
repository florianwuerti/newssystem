@extends('layouts.app')

@section('content')
  <hr>
  <h4>News bearbeiten</h4>
  <hr>

  @if (count($errors) > 0)
      <div class="callout alert">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
<form method="post" action="/admin/news/edit/{{ $news->id }}" enctype="multipart/form-data">
  <div class="row">
      <div class="col-md-8">

       {{ csrf_field() }}

      <div class="form-row">
        <div class="form-group col-md-12">
          <input type="text" name="news_title" id='news_title' class="form-control" value="{{$news->news_title}}" placeholder="Titel hier eingeben">
          <strong>Permalink: </strong><a href="{{ asset('news/') }}/{{$news->id}}" target="wp-preview-104">{{ asset('news/') }}/{{$news->id}}</a></span>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Text</label>
          <textarea name="news_content" rows="8" class="form-control">{{ $news->news_content }}</textarea>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-row">
        <div class="form-group col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-header">Veröffentlichen</div>
            <div class="mb-3 mt-3 ml-3 mr-3 list-group-flush">
              <select name="news_status" class="form-control" id="news_status">
                <option selected="selected" value="draft">Entwurf</option>
                <option value="publish">Veröffentlicht</option>
                <option value="pending">Ausstehender Review</option>
              </select>
              <div class="mt-3">
                @if ($news->news_status === 'Publish')
                  <input type="submit" value="Aktualisieren" id="publish" name="publish" class="btn btn-primary">
                @else
                  <input type="submit" value="Speichern" id="updateNews" name="updateNews" class="btn btn-primary mr-4">
                  <input type="submit" value="Publish" id="publish" name="publish" class="btn btn-primary">
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-header">Kategorien</div>
            <div class="list-group-flush">
              @foreach ($categories as $c)
                <div class="custom-control custom-checkbox list-group-item">
                  <input type="checkbox" class="" id="category[{{$c->id}}]" name="category[{{$c->id}}]" value="{{$c->id}}" checked>
                  <label for="category[{{$c->id}}]">{{$c->name}}</label>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <div class="card" style="width: 18rem;">
          <div class="card-header">Beitragsbild festlegen</div>
          <div class="list-group-flush">
            <div class="list-group-item">
              <label for="news_thumbnail">Beitragsbild</label>
              <input type="file" name="news_thumbnail" id="news_thumbnail">
              <img src="{{ asset('uploads/' . $news->news_thumbnail)}}" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
