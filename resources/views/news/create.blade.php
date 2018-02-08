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

  <form method="post" action="/news/new">

     {{ csrf_field() }}

    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Titel</label>
        <input type="text" name="title" id='title' class="form-control">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Wähle eine Kategorie</label>
          <select id="inputState" class="form-control" name="category[]" multiple>
            @foreach($categories as $c)
              <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Text</label>
        <textarea name="text" rows="8" class="form-control"></textarea>
      </div>
    </div>
    <input type="submit" value="Speichern" class="btn btn-primary">
  </form>

@endsection
