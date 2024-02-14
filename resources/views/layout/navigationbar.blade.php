<nav class="navbar navbar-expand-lg bg-info text-dark">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand" href="{{ route('movie') }}">OriCinema🔥</a>

        <!-- Left Side Navigation Links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movie') }}">List Film</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movie') }}">List Film</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('history') }}">Riwayat Transaksi</a>
                </li>
            @endguest
        </ul>

        <!-- Right Side Navigation Links -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- User Dropdown -->
            @if (!auth()->user())
                <a href="{{ route('formlogin') }}" class="btn btn-success">Please Login First</a>
            @endif
            @if (auth()->user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('changePassword') }}">Ubah Password</a>
                        <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                    </div>
                </li>
            @endif

            <!-- Admin Dropdown (if user is an admin) -->
            @if (auth()->user() && auth()->user()->role == 'admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin Views
                    </a>
                    <div class="dropdown-menu" aria-labelledby="adminDropdown">
                        <a href="{{ route('homeadmin') }}" class="dropdown-item">Home Admin 😜</a>
                        <!-- Add more admin-related links if needed -->
                    </div>
                </li>
            @endif
            @if (auth()->user() && auth()->user()->role == 'owner')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Owner Views
                    </a>
                    <div class="dropdown-menu" aria-labelledby="adminDropdown">
                        <a href="{{ route('owner.dashboard') }}" class="dropdown-item">Home Owner 😜</a>
                        <!-- Add more admin-related links if needed -->
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
