
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
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
          <li class="nav-header">MANAGE USERS</li>
          <li class="nav-item">
            <a href="/admin/create_inspector" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Add Inspector
              </p>
            </a>
              <li class="nav-item">
                <a href="/admin/create_registrar" class="nav-link">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    Add Registrar
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
          </li>

          <!-- <li class="nav-header">Activities</li>
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
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>