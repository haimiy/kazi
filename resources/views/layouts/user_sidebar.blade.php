
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="text-center">
      <a href="/user/index" class="brand-link">
        <img src="{{ asset('assets/dist/img/logox.jpg') }}" alt="Logo" class="img-circle center-block elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PHAB</span>
      </a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 text-center">
        
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}</a>
          {{-- <a href="#" class="d-block">{{ Auth::user()->phone_no }}</a> --}}
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-header">DASHBOARD</li> --}}
          <li class="nav-item">
            <a href="/user/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/app_registration" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Application form
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/user/licenses" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                licenses
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="/user/services_offered" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Services Offered
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/user/nearest" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Health Facility nearest
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/other" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Other
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>