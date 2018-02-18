@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center">Erfasste Artikel</h5>
              <h2 class="card-text text-center">{{count($news)}}</h2>
              <a href="/admin/news" class="card-link">News Liste</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center">Erfasste Kategorien</h5>
              <h2 class="card-text text-center">{{count($cat)}}</h2>
              <a href="/admin/category" class="card-link">Kategorie Liste</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center">Registierte User</h5>
              <h2 class="card-text text-center">{{count($user)}}</h2>
              <a href="/admin/user" class="card-link">User Liste</a>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
