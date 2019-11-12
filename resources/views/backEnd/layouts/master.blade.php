<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset ('/frontend/img/team/ahc1.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ALDOHC||DISTRO Bandung</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2.css')}}">
  <link rel="stylesheet" href="{{ asset('/dist/css/dropify.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

  
  @section('css')

  @show
  <!-- endinject -->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
       <img src="{{ asset('/frontend/img/team/aldohc.png') }}" alt="logo" width="130" height="80" />
       <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
        <i class="fa fa-align-justify" style="color: #fff;"></i>
      </button>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center">
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown d-xl-inline-block">
          
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <span class="profile-text">Hello, {{Auth::user()->name}} !</span>
            @if(Auth::user()->gambar == '')
            <img class="img-xs rounded-circle"  src="{{ asset('assets/img/bcc1.png')  }}" alt="profile image">
            @else
            <img class="img-xs rounded-circle"  src="{{ asset('assets/img/bcc1.png')  }}" alt="profile image">
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Sign Out
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </a>
          <a title="" class="dropdown-item" href="{{url('/admin/settings')}}">Settings</a>
        </div>
      </li>
    </ul>

  </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    @section('nav')
    @include('backEnd.layouts.nav',['user' => Auth::User()])
    @show
  </nav>
  <div class="main-panel">
    <div class="content-wrapper">
      @yield('content')

    </div>
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">>Copyright © {{date('Y')}}
          <a href="#" target="_blank">ALDOHC||DISTRO</a>. All rights reserved.</span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
 <script src="{{ asset('/dist/js/dropify.min.js') }}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>
<script src="{{asset('js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('js/matrix.js')}}"></script>
<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/misc.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
 <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();
                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });
                // Used events
                var drEvent = $('#input-file-events').dropify();
                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });
                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });
                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });
                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
<script>
  $(".deleteRecord").click(function () {
   var id=$(this).attr('rel');
   var deleteFunction=$(this).attr('rel1');
   swal({
     title:'Are you sure?',
     text:"You won't be able to revert this!",
     type:'warning',
     showCancelButton:true,
     confirmButtonColor:'#3085d6',
     cancelButtonColor:'#d33',
     confirmButtonText:'Yes, delete it!',
     cancelButtonText:'No, cancel!',
     confirmButtonClass:'btn btn-success',
     cancelButtonClass:'btn btn-danger',
     buttonsStyling:false,
     reverseButtons:true
   },function () {
    window.location.href="/admin/"+deleteFunction+"/"+id;
  });
 });
</script>


@include('sweet::alert')
@section('js')

@show
</body>

</html>

