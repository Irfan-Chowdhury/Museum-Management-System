  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(Auth::user()->photo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin")
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('admin.home')}}" class="nav-link {{ Route::currentRouteNamed('admin.home') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          @endif

          <!--Admin-->
          @if(Auth::user()->role == "super-admin")
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
                Sub-admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ Route::currentRouteNamed('admin*') ? 'active' : ''}}">
                <a href="{{route('admin-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Sub-admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub-admins List</p>
                </a>
              </li>
            </ul>
          </li>
          @endif


          <!--User List-->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('user-list') ? 'active' : ''}}">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}


          <!--Notice-->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('notice*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Notice
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('notice-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Notice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('notice-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notice Manage</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Rules -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('rule*') ? 'active' : ''}}">
              <i class="nav-icon fa fa-gavel"></i>
              <p>
                Rules
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('rule-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Rule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('rule-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rule Manage</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Museum -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('museum*') || Route::currentRouteNamed('photo*')  ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              {{-- <i class="fas fa-house"></i> --}}
              <p>
                Museum
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('museum-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Museum Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('museum-manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Museum Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('photo-gallery-manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Photo Gallery Manage</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Schedule -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('schedule*') ? 'active' : ''}}">
              <i class="nav-icon fa fa-calendar"></i>
              {{-- <i class="fas fa-house"></i> --}}
              <p>
                Schedule
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('schedule-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('schedule-manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule Manage</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Items of Museum -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('category*') || Route::currentRouteNamed('item*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Items of Museum
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category-manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('item-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('item-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Itmes List</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Visitor -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('visitor-list') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Visitor
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="{{route('visitor-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Visitor</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{route('visitor-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visitors List</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Visit Entry -->
          {{-- @if(Auth::user()->role != "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('visit-entry-create') || Route::currentRouteNamed('visit-entry-list') ? 'active' : ''}}">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Visit Entry
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visit-entry-create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Visit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('visit-entry-list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visit Entry List</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Donation -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('all-donation*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Donation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('all-donation')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Donation Info</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Inbox -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('user-messages') || Route::currentRouteNamed('visitor-messages') || Route::currentRouteNamed('messages-read') ? 'active' : ''}}">
              {{-- <i class="nav-icon fas fa-inbox"></i> --}}
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Inbox
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user-messages')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users Message</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('visitor-messages')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visitors Message</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Report -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('visit-entry-between-dates*') || Route::currentRouteNamed('invoice-between-dates*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visit-entry-between-dates')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visit-Entry Date</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('invoice-between-dates')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}

          <!-- Chart -->
          {{-- @if(Auth::user()->role == "super-admin" || Auth::user()->role == "sub-admin") --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Route::currentRouteNamed('chart-visit-entry') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Chart
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('chart-visit-entry')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chart of Visit Entry</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
