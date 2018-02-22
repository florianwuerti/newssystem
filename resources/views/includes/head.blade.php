<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(View::hasSection('title'))
      <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @else
      <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/ce47dc0f0c.js"></script>
</head>
