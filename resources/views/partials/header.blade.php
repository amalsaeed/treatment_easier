<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a href="/">
        <img src="{{asset('dist/images/logo.png')}}" alt="" width="80" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reservations')}}">Reservations</a>
                </li>
            @endauth

            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Medical Service</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Dentistry Clinic </a>
                    <a class="dropdown-item" href="#">Ear And Throat Clinic</a>
                    <a class="dropdown-item" href="#">Internist Clinic</a>
                    <a class="dropdown-item" href="#">Children Clinic</a>
                    <a class="dropdown-item" href="#">Orthopedic Clinic</a>
                    <a class="dropdown-item" href="#">Chronic Clinic</a>
                    <a class="dropdown-item" href="#">Heart Clinic</a>
                    <a class="dropdown-item" href="#">Obstetrics and Gynecology Clinic</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronic Service</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Communication With The Doctor </a>
                    <a class="dropdown-item" href="#">Appointment Booking</a>
                    <a class="dropdown-item" href="#">Cancel An Appointment</a>
                    <a class="dropdown-item" href="#">Change The Appointment Time</a>

                </div>
            </li>
            @endauth
        </ul>

        @auth
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @else
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="{{route('login')}}">Login</a>
        @endauth
    </div>
</nav>
