@extends('layouts.app')

@section('content')
  <hr>
  <h4>Neue News schreiben</h4>
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

  <form method="post" action="/news/new" enctype="multipart/form-data">

     {{ csrf_field() }}

    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Titel</label>
        <input type="text" name="title" id='title' class="form-control">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <div class="card" style="width: 18rem;">
          <div class="card-header">Kategorien</div>
          <div class="list-group-flush">
            @foreach ($categories as $c)
              <div class="custom-control custom-checkbox list-group-item">
                <input type="checkbox" class="" id="category[{{$c->id}}]" name="category[{{$c->id}}]" value="{{$c->id}}">
                <label for="category[{{$c->id}}]">{{$c->name}}</label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Text</label>
        <textarea name="text" rows="8" class="form-control"></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
  			<label for="post_thumbnail">Thumbnail</label> <br/>
  			<input type="file" name="post_thumbnail" id="post_thumbnail">
			</div>
    </div>
    <input type="submit" value="Speichern" class="btn btn-primary">
  </form>

@endsection
