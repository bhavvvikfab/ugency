<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link   {{ request()->routeIs('dashboardView') ? '' : 'collapsed' }}" href="{{ route('dashboardView')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="components-alerts.html">
            <i class="bi bi-circle"></i><span>Alerts</span>
          </a>
        </li>
        <li>
          <a href="components-accordion.html">
            <i class="bi bi-circle"></i><span>Accordion</span>
          </a>
        </li>
      </ul>
    </li> -->
    
    @if (auth()->user()->can('display campaign'))
    <li class="nav-item ">
      <a class="nav-link  {{ request()->routeIs('campaign') ? '' : 'collapsed' }}" href="{{route('profileView')}}">
        <i class="bi bi-person"></i>
        <span>Campaign</span>
      </a>
    </li><!-- End Campaign Page Nav -->
    @endif

    @if (auth()->user()->can('display campaign request'))
    <li class="nav-item ">
      <a class="nav-link  {{ request()->routeIs('campaign-request') ? '' : 'collapsed' }}" href="{{route('profileView')}}">
        <i class="bi bi-person"></i>
        <span>Campaign Request</span>
      </a>
    </li><!-- End Campaign Request Page Nav -->
    @endif

    @if (auth()->user()->can('display agreement'))
    <li class="nav-item ">
      <a class="nav-link  {{ request()->routeIs('agreement') ? '' : 'collapsed' }}" href="{{route('profileView')}}">
        <i class="bi bi-file-earmark-check"></i>
        <span>Campaign Agreement</span>
      </a>
    </li><!-- End Campaign Agreement Page Nav -->
    @endif

    @if (auth()->user()->can('display invoice'))
    <li class="nav-item ">
      <a class="nav-link  {{ request()->routeIs('Invoice') ? '' : 'collapsed' }}" href="{{route('profileView')}}">
        <i class="bi bi-receipt"></i>
        <span>Invoice</span>
      </a>
    </li><!-- End Invoice Page Nav -->
    @endif
    
    @if (auth()->user()->can('display clients user'))
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-add"></i><span>Clients Users</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="components-alerts.html">
            <i class="bi bi-circle"></i><span>Admin</span>
          </a>
        </li>
        <li>
          <a href="components-accordion.html">
            <i class="bi bi-circle"></i><span>Account</span>
          </a>
        </li>
      </ul>
    </li><!-- End Clients Users Page Nav -->
    @endif

    @if (auth()->user()->can('display address'))
    <li class="nav-item ">
      <a class="nav-link  {{ request()->routeIs('address') ? '' : 'collapsed' }}" href="{{route('profileView')}}">
        <i class="bi bi-person-lines-fill"></i>
        <span>Address</span>
      </a>
    </li><!-- End Address Page Nav -->
    @endif
    <!-- <li class="nav-heading">Pages</li> -->

    <!-- <li class="nav-item ">
      <a class="nav-link  {{ request()->routeIs('profileView') ? '' : 'collapsed' }}" href="{{route('profileView')}}">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li> -->
    <!-- End Profile Page Nav -->

    @if (auth()->user()->can('display settings'))
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('settingView') ? '' : 'collapsed' }}" href="{{route('settingView')}}">
        <i class="bi bi-gear"></i>
        <span>Settings</span>
      </a>
    </li><!-- End Profile Page Nav -->
    @endif

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('logout') ? '' : 'collapsed' }}" href="{{route('settingView')}}">
        <i class="bi bi-box-arrow-right"></i>
        <span>LogOut</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('registerView')}}">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li> -->
    <!-- End Register Page Nav -->

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('loginView')}}">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li> -->
    <!-- End Login Page Nav -->

    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-error-404.html">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li> -->
    <!-- End Error 404 Page Nav -->


  </ul>

</aside><!-- End Sidebar-->