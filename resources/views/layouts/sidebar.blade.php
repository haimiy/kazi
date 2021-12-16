
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
          @if(auth()->user()->role_id == 2)
          <li class="nav-item">
            <a href="/admin/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Manage Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
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
            </ul>
          </li>
         
          <li class="nav-header">Show Private Hospital</li>
          <li class="nav-item">
            <a href="/admin/show_health_facility" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                By General List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/by_level" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                By Level
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/by_district" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                By district
              </p>
            </a>
          </li>
          <li class="nav-header">Add Hospital</li>
          <li class="nav-item">
            <a href="/admin/create_health_facility" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add Hospital
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

          <li class="nav-header">Activities</li>
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
          @endif
          @if(auth()->user()->role_id == 3)
          <li class="nav-item">
            <a href="/user/index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/registrar/application_list" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Application
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="/registrar/licences_list" class="nav-link">
                <i class="nav-icon fa fa-address-card"></i>
                <p>
                    Licenses
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/registrar/import_existing_data" class="nav-link">
                <i class="nav-icon fa fa-university"></i>
                <p>
                    Health Facility
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/registrar/map" class="nav-link">
                <i class="nav-icon fa fa-map-marker"></i>
                <p>
                    Map
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/registrar/send_message_interface" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                    Send Message
                </p>
            </a>
        </li>
         <li class="nav-item">
            <a href="/hospital_statistics" class="nav-link">
              <i class="nav-icon fa fa-history"></i>
              <p>
                Hospital Statistics
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>