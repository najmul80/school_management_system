
@php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">

    <div class="user-profile">
      <div class="ulogo">
        <a href="{{route('dashboard')}}">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{asset('/')}}assets/images/logo-dark.png" alt="">
            <h3><b>Sunny</b> Admin</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{$route == 'dashboard' ? 'active' : ''}}">
        <a href="{{route('dashboard')}}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview {{ ($prefix == '/users') ? 'active' : '' }}" >
        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Manage User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View User</a></li>
          <li><a href="calendar.html"><i class="ti-more"></i>Add User</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/profile') ? 'active' : '' }}" >
        <a href="#">
          <i data-feather="mail"></i> <span>User Profile</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu"> 
          <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>Your Profile</a></li>
          <li><a href="{{route('password.form')}}"><i class="ti-more"></i>Change Password</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="file"></i>
          <span>Pages</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
          <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
          <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
          <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
          <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="alert-triangle"></i>
          <span>Authentication</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
          <li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
          <li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
          <li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
          <li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
          <li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>
        </ul>
      </li>

      <li>
        <a href="auth_login.html">
          <i data-feather="lock"></i>
          <span>Log Out</span>
        </a>
      </li>

    </ul>
  </section>

  <div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
  </div>
</aside>