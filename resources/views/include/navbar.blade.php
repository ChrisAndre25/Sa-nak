<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand brand text-primary font-weight-bold" href="{{ url('/') }}">
            {{ config('app.name', 'Sanak') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto ml-3">
                <li class="nav-item">
                    <a class="nav-link text-primary font-weight-bold" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary font-weight-bold" href="{{ route('catalog') }}">Katalog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-primary font-weight-bold" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{ route('view-category', $category->id) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <form class="form-inline mx-2" action="{{ action('HomeController@searchProduct') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="product" id="product" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-lg"></i>
                        </button>
                    </div>
                </form>

                @if(Auth::check())
                    @if(Auth()->user()->role == 'USER')
                    <li class="nav-item">
                        <a class="nav-link my-1" href="{{ route('view-cart') }}" title="Cart">
                            <i class="fas fa-shopping-cart fa-lg text-info"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link my-1" href="{{ route('history') }}" title="Transaction History">
                            <i class="fas fa-history fa-lg text-info"></i>
                        </a>
                    </li>
                    @elseif (Auth()->user()->role == 'SELLER')
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Product
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('add-product') }}">
                                {{ __('Add Product') }}
                            </a>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                {{ __('Add Category') }}
                            </a>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                {{ __('Update Category') }}
                            </a>
                        </div>
                    </li>
                    @endif
                @endif

                <li class="nav-item my-auto mx-2">
                    <div class="vl"></div>
                </li>

                <!-- Authentication Links -->
                @guest
                <li class="nav-item my-auto mx-1">
                    <a class="btn btn-outline-info font-weight-bold" href="{{ route('login') }}"
                        role="button">{{ __('Masuk') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item my-auto">
                    <a class="btn btn-primary font-weight-bold" href="{{ route('register') }}"
                        role="button">{{ __('Daftar') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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