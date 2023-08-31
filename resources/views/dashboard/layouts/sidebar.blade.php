<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'bg-dark text-light active rounded-end' : '' }}"
                    aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'bg-dark text-light active rounded-end' : '' }}"
                    href="/dashboard/posts">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    My Posts
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/about*') ? 'bg-dark text-light active rounded-end' : '' }}"
                    href="/dashboard/about">
                    <span data-feather="info" class="align-text-bottom"></span>
                    About
                </a>
            </li> --}}
            <li class="nav-item fixed-bottom mb-2">
                <a class="nav-link {{ Request::is('/*') ? 'bg-dark text-light active rounded-end' : '' }}"
                    href="/posts">
                    <span data-feather="arrow-left-circle" class="align-text-bottom"></span>
                    Back to Blog
                </a>
            </li>
        </ul>

        {{-- pakai GATE --}}
        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
                <span>ADMINISTRATOR</span>
            </h6>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'bg-dark text-light active rounded-end' : '' }}"
                        href="/dashboard/categories">
                        <span data-feather="grid" class="align-text-bottom"></span>
                        Post Categories
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/profil*') ? 'bg-dark text-light active rounded-end' : '' }}"
                        href="/dashboard/profil">
                        <span data-feather="user" class="align-text-bottom"></span>
                        Edit Profil
                    </a>
                </li>
            </ul>
            {{-- <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/about*') ? 'bg-dark text-light active rounded-end' : '' }}"
                        href="/dashboard/about">
                        <span data-feather="user" class="align-text-bottom"></span>
                        About
                    </a>
                </li>
            </ul> --}}
        @endcan

    </div>
</nav>
