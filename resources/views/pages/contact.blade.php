@extends('layouts.app')

@section('title', 'Kontakt')

@section('content')
  <h1>Kontakt Seite</h1>

  <form action="/" method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFirstname">Vorname</label>
        <input type="text" class="form-control" name="inputFirstname" id="inputFirstname" placeholder="Vorname">
      </div>
      <div class="form-group col-md-6">
        <label for="inputLastname">Nachname</label>
        <input type="text" class="form-control" name="inputLastname" id="inputLastname" placeholder="Nachname">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputPhone">Telefon</label>
        <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Telefon">
      </div>
      <div class="form-group col-md-6">
        <label for="inputFirma">Firma</label>
        <input type="text" class="form-control" name="inputFirma" id="inputCompany" placeholder="Firma">
      </div>
    </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="inputMessage">Deine Nachricht</label>
        <textarea class="form-control" name="inputMessage" id="inputMessage" rows="10"></textarea>
      </div>
    <button type="submit" class="btn btn-primary mb-4">Kontaktanfrage Senden</button>
  </form>
@endsection
