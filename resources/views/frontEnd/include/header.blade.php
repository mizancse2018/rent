<!--header start-->
<header class="header sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light stickey-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/frontEndAsset/img/logo.jpg') }}" width="120px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="{{ route('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{ route('properties') }}">Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Tenant</a></li>
                            <li><a class="dropdown-item" href="{{ route('owner.login') }}">Owner</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.login') }}">Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Register</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('register') }}">Tenant</a></li>
                            <li><a class="dropdown-item" href="{{ route('owner.register') }}">Owner</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.register') }}">Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="{{ route('owner.login') }}">Post Property</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--header end-->
