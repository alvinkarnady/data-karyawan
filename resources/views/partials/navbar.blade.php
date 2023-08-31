<nav class="navbar navbar-expand-lg py-3 navbar-white bg-white shadow rounded">
    <div class="container">
        <a class="navbar-brand" href="/" style="font-family:Arial,Courier, monospace; ">Data Karyawan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="font-family: Arial ;">
            <ul class="navbar-nav">
                {{-- <li class="nav-item ">
                    <a class="nav-link {{ $active === 'home' ? 'active rounded shadow' : '' }}"
                        href="/">Home</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active  rounded shadow' : '' }}"
                        href="/about">About</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'posts' ? 'active rounded shadow' : '' }}" href="/posts">Input
                        Cuti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active rounded shadow' : '' }}"
                        href="/categories">Riwayat Cuti</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome, {{ auth()->user()->name_users }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>

                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link" {{ $active === 'login' ? 'active' : '' }}><i
                                class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>

                @endauth
            </ul>


        </div>
    </div>
</nav>
