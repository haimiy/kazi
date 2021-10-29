
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
      <a href="/admin/index" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle center-block elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PHAB</span>
      </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 text-center">
        {{-- <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->first_name. ' '.Auth::user()->middle_name. ' '.Auth::user()->last_name}}</a>
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
            <a href="/user/general_facility_info" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                General Facility Info
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/user/location" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Facility location
              </p>
            </a>
          </li>

          <li class="nav-item">
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
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>