<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                  <li>
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/ueber-uns">Über uns</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/projekte">Projekte</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/blog">Blog</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/kontakt">Kontakt</a>
                  </li>
                @endguest
                @auth
                  <li>
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/ueber-uns">Über uns</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/projekte">Projekte</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/blog">Blog</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/kontakt">Kontakt</a>
                  </li>
                  <li>
                    <a class="nav-link" href="/admin">Dashboard</a>
                  </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
