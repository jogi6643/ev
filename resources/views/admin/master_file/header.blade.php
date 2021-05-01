<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>  @yield('title') </title>

  <link href="{{url('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="{{url('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('public/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  @yield('cssSection')

  <style>
    .content-loader{
      transform: translate(70%, 36%);
      position: absolute;
      z-index: 99;
    }

    .content-loader img{
        width: 360px;
    }

    a{text-decoration: none!important; cursor: pointer !important;}
    .btn-right {
    float: right;
    margin-top: -55px;
    margin-right: 10px;
    z-index: 99;
}
.invalid-field{
  color:red;
}
.loading{   
  width:20px;
  position:absolute;
}

.table td, .table th {
    padding: .4rem;
    border-top: 1px solid #e3e6f0;
}

.ui-cursor{
  cursor: move!important;
}
.text-class{color:red;}

    .sidebar .nav-item .collapse .collapse-inner .collapse-item, .sidebar .nav-item .collapsing .collapse-inner .collapse-item {
      padding: 0.3rem 1rem;
      margin: 0 0.5rem;
      display: block;
      color: #e0e0e0;
      text-decoration: none;
      border-radius: -5.65rem;
      /* white-space: nowrap; */
    }

    .sidebar .sidebar-brand {
    height: 3.375rem;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 400;
     padding: 2.5rem 1rem; 
    text-align: center;
    text-transform: uppercase;
    letter-spacing: .05rem; 
    z-index: 1;
}

.sidebar .nav-item .nav-link {
    display: block;
    width: 100%;
    text-align: left;
    padding: 0.6rem !important;
    width: 14rem;
}
.topbar {
    height: 3.375rem !important;
}

.sidebar .nav-item .collapse .collapse-inner .collapse-item:hover, .sidebar .nav-item .collapsing .collapse-inner .collapse-item:hover {
    background-color: #eaecf4;
    color: #4a4a4a !important;
}

.item-active {
    background-color: #eaecf4;
    color: #4a4a4a !important;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #606588 !important;
    font-size: 14px !important; 
}






  </style>
 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-2" style="margin: 10px;">
           {{ Auth::guard('admin')->user()->name }}
           <p style="font-size: 12px;">{{ Auth::guard('admin')->user()->created_at }}</p>
        </div>
      </a>

      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-coadmin" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <span>Co-admin</span>
        </a>

        <div id="collapse-coadmin" class="collapse {{ Request::is('admin/coadmin') || Request::is('admin/coadmin/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">

            <a class="collapse-item {{ Request::is('admin/coadmin') ? 'item-active' : '' }}" href="{{ route('admin.coadmin.index') }}"> Manage Roles </a>

            <a class="collapse-item {{ Request::is('admin/coadmin/create') ? 'item-active' : '' }}" href="{{ route('admin.coadmin.create') }}"> Add Role </a>

          </div>

        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-role" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <span>List Role</span>
        </a>

        <div id="collapse-role" class="collapse {{ Request::is('admin/role') || Request::is('admin/role/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">

            <a class="collapse-item {{ Request::is('admin/role') ? 'item-active' : '' }}" href="{{ route('admin.role.index') }}"> Manage Roles </a>

            <a class="collapse-item {{ Request::is('admin/coadmin/create') ? 'item-active' : '' }}" href="{{ route('admin.role.create') }}"> Add Role </a>

          </div>

        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-attribut" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <span>Attributes</span>
        </a>

        <div id="collapse-attribut" class="collapse {{ Request::is('admin/attribute') || Request::is('admin/attribute/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">

            <a class="collapse-item {{ Request::is('admin/attribute') ? 'item-active' : '' }}" href="{{ route('admin.attribute.index') }}"> Manage Attributes </a>

            <a class="collapse-item {{ Request::is('admin/attribute/create') ? 'item-active' : '' }}" href="{{ route('admin.attribute.create') }}"> Add Attribute </a>

          </div>

        </div>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-bar-chart" aria-hidden="true"></i>
          <span>Category</span>
        </a>

        <div id="collapseTwo" class="collapse {{ Request::is('admin/category') || Request::is('admin/category/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">
            <a class="collapse-item {{ Request::is('admin/category') ? 'item-active' : '' }}" href="{{ route('admin.category.index') }}">Manage category</a>

            <a class="collapse-item {{ Request::is('admin/category/create') ? 'item-active' : '' }}" href="{{ route('admin.category.create') }}"> Add category </a>

          </div>

        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebrand" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-bar-chart" aria-hidden="true"></i>
          <span>Brand</span>
        </a>

        <div id="collapsebrand" class="collapse {{ Request::is('admin/brand') || Request::is('admin/brand/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">

            <a class="collapse-item {{ Request::is('admin/brand') ? 'item-active' : '' }}" href="{{ route('admin.brand.index') }}">Manage Brand</a>

            <a class="collapse-item {{ Request::is('admin/brand/create') ? 'item-active' : '' }}" href="{{ route('admin.brand.create') }}"> Add Brand </a>


          </div>

        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproduct" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
          <span>Product</span>
        </a>

        <div id="collapseproduct" class="collapse {{ Request::is('admin/product') || Request::is('admin/product/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">

            <a class="collapse-item {{ Request::is('admin/product') ? 'item-active' : '' }}" href="{{ route('admin.product.index') }}">Manage Product</a>

            <a class="collapse-item {{ Request::is('admin/product/create') ? 'item-active' : '' }}" href="{{ route('admin.product.create') }}"> Add Product </a>


          </div>

        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <span>Customer</span>
        </a>

        <div id="collapseuser" class="collapse {{ Request::is('admin/user') || Request::is('admin/user/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">

            <a class="collapse-item {{ Request::is('admin/user') ? 'item-active' : '' }}" href="{{ route('admin.user.index') }}">User Manage</a>

            <a class="collapse-item {{ Request::is('admin/user/create') ? 'item-active' : '' }}" href="{{ route('admin.user.create') }}"> Add User </a>

          </div>

        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsestates" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-location-arrow" aria-hidden="true"></i>
          <span>States</span>
        </a>

        <div id="collapsestates" class="collapse {{ Request::is('admin/states') || Request::is('admin/states/create') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white1 py-2 collapse-inner rounded">

            <a class="collapse-item {{ Request::is('admin/states') ? 'item-active' : '' }}" href="{{ route('admin.states.index') }}">States Manage</a>

            <a class="collapse-item {{ Request::is('admin/states/create') ? 'item-active' : '' }}" href="{{ route('admin.states.create') }}"> Add States </a>

          </div>

        </div>
      </li>

      

      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul><!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">2+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
          
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                <img class="img-profile rounded-circle" src="https://www.centrik.in/wp-content/uploads/2017/02/user-image-.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                  <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- bardcrum --> 
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              @yield('breadcrumb')
          </ol> 
        </nav>
            <div class="content-loader" id="positionLoding" style="display:none;">
              <img src="{{url('public/ajax-loader.gif')}}" class="divload"/>
            </div>
              
              @yield('body_content')

        </div><!-- /.container-fluid -->
      </div><!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div><!-- End of Content Wrapper -->
  </div><!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="">Logout</a>
        </div>
      </div>
    </div>
  </div>

  

  <script src="{{url('public/admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('public/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('public/admin/js/sb-admin-2.min.js')}}"></script>

  <script src="{{url('public/admin/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('public/admin/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{url('public/admin/js/demo/chart-pie-demo.js')}}"></script>



  <script src="{{url('public/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('public/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('public/admin/js/demo/datatables-demo.js')}}"></script>


  @yield('extraScript')
  @yield('scriptSection')


</body>
</html>
