@include('includes.head')
<body>
  @include('includes.header')
  <div id="app">
      <main class="container">
          @yield('content')
      </main>
  </div>
@include('includes.footer')
