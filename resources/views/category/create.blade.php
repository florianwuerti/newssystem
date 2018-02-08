@extends('layouts.app')

@section('content')

  <hr>
  <h4>Neue Kategorie erstellen</h4>

  <hr>

  <form action="/category/new" method="post">
    {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">Name</label>
        <input type="text" name="name" id='name' class="form-control">
      </div>
    </div>
      <input type="submit" value="Speichern" class="btn btn-primary">
  </form>
@endsection
