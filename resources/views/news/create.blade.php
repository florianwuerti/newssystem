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
<div class="row">
  <div class="col-md-8">
    <form method="post" action="/admin/news/new" enctype="multipart/form-data">

       {{ csrf_field() }}

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Titel</label>
          <input type="text" name="news_title" id='news_title' class="form-control">
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
          <textarea name="news_content" rows="8" class="form-control"></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
    			<label for="news_thumbnail">Thumbnail</label> <br/>
    			<input type="file" name="news_thumbnail" id="news_thumbnail">
  			</div>
      </div>
      <input type="submit" value="Speichern" class="btn btn-primary">
    </form>
  </div>
  <div class="col-md-4">
    <div class="form-row">
      <div class="form-group col-md-4">
        <div class="card" style="width: 18rem;">
          <div class="card-header">Status</div>
          <div class="list-group-flush">
            <select name="news_status" id="news_status">
              <option selected="selected" value="draft">Entwurf</option>
              <option value="publish">Veröffentlicht</option>
              <option value="pending">Ausstehender Review</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
