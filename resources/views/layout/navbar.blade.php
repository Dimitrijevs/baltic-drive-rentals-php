<div class="container">
    <li class="nav-item d-flex align-items-center">
        <i class="bi bi-car-front text-warning h2 my-0 me-1"></i>
        <a href="{{ route('home') }}" class="navbar-brand text-warning">Baltic Drive Rentals</a>
    </li>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item d-flex align-items-center mx-2">
                <i class="bi bi-clock-history text-white"></i><a href="{{ route('learn') }}"
                    class="{{ Route::is('learn') ? 'active' : '' }} nav-link p-1">Learn to drive</a>
            </li>

            <li class="nav-item d-flex align-items-center mx-2">
                <i class=" bi bi-file-earmark-ruled text-white"></i><a href="{{ route('terms') }}"
                    class="{{ Route::is('terms') ? 'active' : '' }} nav-link p-1">Rental Terms</a>
            </li>

            <li class="nav-item d-flex align-items-center mx-2">
                <i class="bi bi-car-front-fill text-white"></i><a href="{{ route('cars') }}"
                    class="{{ Route::is('cars') ? 'active' : '' }} nav-link p-1">Our
                    Car List</a>
            </li>

            @auth
                <li class="nav-item d-flex align-items-center mx-2">
                    <i class="bi bi-person-circle text-white ms-5"></i><a href="{{ route('profile', auth()->user()->id) }}"
                        class="{{ Route::is('profile') ? 'active' : '' }} nav-link p-1">Profile Page</a>
                </li>

                <li class="nav-item d-flex align-items-center mx-2 bg-danger py-1 px-2">
                    <i class="bi bi-person-circle text-white"></i><a href="{{ route('logout') }}" class="nav-link p-1">Log
                        Out</a>
                </li>
            @endauth

            @guest
                <li class="nav-item d-flex align-items-center mx-2">
                    <i class="bi bi-box-arrow-in-right text-white ms-5"></i><a href="{{ route('login') }}"
                        class="{{ Route::is('login') ? 'active' : '' }} nav-link p-1">Log In</a>
                </li>

                <li class="nav-item d-flex align-items-center mx-2">
                    <i class="bi bi-box-arrow-in-right text-white"></i><a href="{{ route('register') }}"
                        class="{{ Route::is('register') ? 'active' : '' }} nav-link p-1">Register</a>
                </li>
            @endguest


        </ul>
    </div>
</div>
