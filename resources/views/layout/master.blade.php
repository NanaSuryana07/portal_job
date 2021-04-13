<!doctype html>
<html lang="en">
  <head>
    <title>Job Application</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="{{asset('css/enter.css')}}" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
  <body class="d-flex flex-column" style="background:#007bff;background:linear-gradient(to right, #0062E6, #33AEFF);">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <i class="fas fa-building    " style="color:#007bff;"></i>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                @guest
                <li class="nav-item {{ (request()->is('welcome') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('welcome') }}>Home <span class="sr-only">(current)</span></a>
                </li>  
                <li class="nav-item {{ (request()->is('user.listjob') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('user.listjob') }}>Job Vacancy <span class="sr-only">(current)</span></a>
                </li>  
                <li class="nav-item {{ (request()->is('user.listjob') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('about') }}>About <span class="sr-only">(current)</span></a>
                </li>
                @else
                <li class="nav-item {{ (request()->is('index') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('index') }}>Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ (request()->is('profiles.show') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('profiles.show', Auth::user()->id) }}>Profile <span class="sr-only">(current)</span></a>
                </li>
                    @if (Auth::user()->hasRole(['Admin']))
                        <div></div>
                    @else
                    <li class="nav-item {{ (request()->is('user.listjob') ? 'active':'') }}">
                        <a class="nav-link" href={{ route('user.listjob') }}>Job Vacancy <span class="sr-only">(current)</span></a>
                    </li> 
                    @endif  
                <li class="nav-item {{ (request()->is('user.listjob') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('about') }}>About <span class="sr-only">(current)</span></a>
                </li>
                @endguest
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                @guest
                <li class="nav-item {{ (request()->is('login') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('login') }}><i class="fas fa-sign-in-alt    "></i> Login</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item {{ (request()->is('register') ? 'active':'') }}">
                    <a class="nav-link" href={{ route('register') }}><i class="fas fa-sign    "></i> Register</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user    "></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
 
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt    "></i> {{ __('Logout') }}
                        </a>
 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="{{ route('profiles.edit', Auth::user()->id) }}"
                           onclick="">
                            <i class="fas fa-user-edit    "></i> Edit Profile
                        </a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    
    @yield('main')
    <div class="py-4">
        @yield('content')
    </div>

    <footer id="sticky-footer" class="py-4 bg-dark text-white-50" style="position:relative;bottom:0px;width:100%">
        <div class="container text-center">
          <small>Copyright &copy; Aifa Nur Amalia 2019</small>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>