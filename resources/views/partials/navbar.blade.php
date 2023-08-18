<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">BCT News</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Economics") ? 'active' : '' }}" href="/economics">Economics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Technology") ? 'active' : '' }}" href="/technology">Politic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Technology") ? 'active' : '' }}" href="/technology">International</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Sports") ? 'active' : '' }}" href="/sports">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Technology") ? 'active' : '' }}" href="/technology">Technology</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->image) }}" alt="" style="max-width: 30px"> {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link"><i class="bi bi-person-circle"></i> Login</a>
                </li>
                @endauth
            </ul>   

        </div>
    </div>
</nav>

