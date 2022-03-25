<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky pt-6" >
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{'/home'}}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('all_posts') }}">
                    <span data-feather="file"></span>
                    Posts
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between bg-primary align-items-center px-3 mt-4 pt-2 pb-2 mb-1">
            <span>USER MANAGEMENT</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('registered_users') }}">
                    <span data-feather="file-text"></span>
                    Admins
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <span data-feather="file-text"></span>
                    Logout
                </a>
            </li>

        </ul>
    </div>
</nav>
