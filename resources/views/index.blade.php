@extends('master')

<nav class="navbar bg-body-tertiary fixed-top" style="margin-top:-6px">

    <div class="container-fluid bg-primary">
        <a class="navbar-brand text-white" href="/home"><b>Events Management</b></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><b>Events</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="home">Events</a>
                    </li>


                    @if(session('user'))
                    {{-- Display these menu items if the user is logged in --}}
                    @if(session('user')->role_as == 1)
                    {{-- Display these menu items if role_as is 1 --}}
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page"
                            href="{{ route('events.manage') }}">Manage
                            Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page"
                            href="{{ route('users.manage') }}">Manage
                            User's</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page"
                            href="{{ route('bookings.manage') }}">Manage Bookings</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="">Tickets Management</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active text-primary" href="#">My Booking</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link active text-primary" href="/logout">Logout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('users.show', session ('user')->id) }}">
                            <b class="text-primary">{{ session('user')->name }}</b></a>
                    </li>

                    @else
                    {{-- Display these menu items if the user is not logged in --}}
                    <li class="nav-item">
                        <a class="nav-link active text-primary" href="/">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary" href="register">Register</a>
                    </li>
                    @endif
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>