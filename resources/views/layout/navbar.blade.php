<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel 7</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-2" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/coba">Action</a>
                      <a class="dropdown-item ajax-link" href="/loadCoba">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                <a class="nav-item nav-link mr-3" href="{{ url('/user') }}">Users</a>
                <a class="nav-item nav-link btn btn-sm shadow-sm btn-logout " href="{{ url('/logout') }}">Logout <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</nav>