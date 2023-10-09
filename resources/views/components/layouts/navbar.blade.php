<nav class="navbar navbar-expand-lg bg-success navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Whire Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('shop*') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">Home</a>
                </li> --}}
            </ul>
            <ul class="navbar-nav">
                @livewire('shop.cartnav')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.product') }}">Products</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
