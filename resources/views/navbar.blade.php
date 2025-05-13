@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/navbar.css'])

<nav class="navbar-homepage">
    <img src="{{ asset('images/SALFORD.png') }}" alt="Logo" class="navbar-logo">

    <div class="nav-text sticky-top bg-body-tertiary">
        <h1 class="nav-name">INOVATECH UNIVERSITY</h1>
        <p class="nav-subname">Shaping the future, one byte at a time.</p>
    </div>


    @unless (isset($hideLinks) && $hideLinks)
        <div class="nav-links">
            <!-- <a class="active" href="#">Home</a>
            <a class="active-LogIn" href="{{ route('login') }}">Sign In</a>
            <a class="active-SignUp" href="{{ route('show.signup') }}">Sign up</a> -->
        </div>
    @endunless
</nav>