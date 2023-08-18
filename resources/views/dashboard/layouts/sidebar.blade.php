<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      
      <div class="profil">
        @if ( auth()->user() )
        <div class="photo">
          <img class="" src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
        </div>
        @else
        <i class="bi bi-person-circle"></i>
        @endif
        <div class="name">
          <p>{{ auth()->user()->name}}</p>
          <a href="/dashboard/profile">See My Profile</a>
        </div>
      </div>
      
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-layout-text-sidebar-reverse"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/sports*') ? 'active' : '' }}" href="/dashboard/sports">
            <i class="bi bi-bicycle"></i>
            Sports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-coin"></i>
            Economics
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-lightbulb"></i>
            Technology
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-universal-access"></i>
            Politic
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-globe"></i>
            International
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
          </a>
        </li>
      </ul>
    </div>
  </nav>