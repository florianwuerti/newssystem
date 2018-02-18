@include('includes.head')
<body>


  @if (request()->is('admin*'))
    @include('includes.admin.header')
  @else
    @include('includes.header')
  @endif
  <div id="app">
      <main class="container">
          @yield('content')
      </main>
  </div>
@include('includes.footer')
