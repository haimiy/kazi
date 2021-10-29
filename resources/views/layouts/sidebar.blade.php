
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/index" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="/admin/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/create_users" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Add Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/show_users" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Show Users
              </p>
            </a>
          </li>
         
          {{-- <li class="nav-header">HEALTH FACILITY</li> --}}
          <li class="nav-item">
            <a href="/admin/create_health_facility" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add Hospital
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/show_health_facility" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Show Hospital
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/hospital_statistics" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Hospital Statistics
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Show Hospital
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>By General List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>By Level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>By District</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-header">ACTIVITIES</li>
          <li class="nav-item">
            <a href="/admin/type_of_health_unit" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Health Unit</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/authority_responsible " class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Authority Responsible</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/service_offered" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Services Offered</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/staffing" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Staffing</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/premises" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Premises</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/no_of_beds" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>No. of beds</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>