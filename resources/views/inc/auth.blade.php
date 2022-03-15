<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-green shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{url('sarasas')}}">
                {{ config('app.name', 'Tvarkaraštis') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                @if(Auth::check() && Auth::user()->isAdmin == 1)
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-dark m-1" href="{{ url('/home') }}">Sudaryti tvarkaraštį</a>
                    </li>
                </ul>
                @endif


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                    </li>
                    @endif
                    @else



                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->vardas }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                            <a class="btn btn-primary w-90 my-1" href="{{ url('/prideti/grupe') }}">Pridėti grupes</a>
                            <a class="btn btn-primary w-90 my-1" href="{{ url('/prideti/patalpas') }}">Pridėti patalpas</a>
                            <a class="btn btn-primary w-90 my-1" href="{{ url('/prideti/destytoja') }}">Pridėti dėstytojus</a>
                            <a class="btn btn-primary w-90 my-1" href="{{ url('/prideti/dalyka') }}">Pridėti dalykus</a>

                            <a class="btn btn-danger w-90 my-1" href="{{ route('logout') }}" onclick="event.preventDefault();
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
