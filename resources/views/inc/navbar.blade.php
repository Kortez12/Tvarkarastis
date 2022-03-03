<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-green shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{url('sarasas')}}" class="btn btn-success">Sarašas</a>
                    </li>
                </ul>
                @if(Auth::check() && Auth::user()->isAdmin == 1)
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="btn btn-danger m-1" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary m-1" href="{{ url('/prideti/destytoja') }}">Pridėti dėstytojus</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary m-1" href="{{ url('/prideti/grupe') }}">Pridėti grupes</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary m-1" href="{{ url('/prideti/dalyka') }}">Pridėti dalykus</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary m-1" href="{{ url('/prideti/patalpas') }}">Pridėti patalpas</a>
                    </li>
                </ul>
                @endif


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else



                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->vardas }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
