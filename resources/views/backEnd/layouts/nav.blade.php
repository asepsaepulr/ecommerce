<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ asset('assets/img/bcc1.png')  }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{Auth::user()->name}}</p>
            <div>
              <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }} ADMIN</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
      </div>
      <li class="nav-item">
        <a class="nav-link" href="/admin">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-content-copy"></i>
          <span class="menu-title">Input Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link" >Category</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('product.index') }}" class="nav-link">Product</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
          <i class="menu-icon fa fa-user"></i>
          <span class="menu-title">Data User</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{ url('/admin/view-orders')}}" class="nav-link">Order</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/view-users')}}" class="nav-link">User</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon fa fa-bullhorn"></i>
          <span class="menu-title">Input Information</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a href="{{ route('galeri.index') }}" class="nav-link">Slider</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('artikel.index') }}" class="nav-link">Blog</a>
            </li>
          </ul>
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/payment')}}">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Payment Confirm</span>
        </a>
      </li>
    </ul>
  </nav>
</div>