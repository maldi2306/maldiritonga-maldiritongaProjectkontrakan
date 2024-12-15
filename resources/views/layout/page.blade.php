<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kontrakan bapak Edi </title>
  <link rel="shortcut icon" type="image/png" href="/modern/src/assets/images/logos/logo.png" />
  <link rel="stylesheet" href="/modern/src/assets/css/styles.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="" style="margin-top: -20px; text-align: center;">
          
          <ul id="sidebarnav" style="margin: 0 auto; list-style: none; padding: 0;">
            <!-- Logo -->
            <li>
              <a class="text-nowrap logo-img" style="display: block; text-align: center; margin-bottom: -20px;">
                <img src="/modern/src/assets/images/logos/logo.png" width="250" alt="" />
              </a>
              
              <li class="nav-small-cap" style="text-align: left; margin-left: 0px; margin-top: -5px;">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
              
              <li class="sidebar-item" style="margin-top: 5px;">
                <a class="sidebar-link" href="/Dasboard" aria-expanded="false">
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              
              <li class="nav-small-cap" style="text-align: left; margin-left: 0px; margin-top: 5px;">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">MENU</span>
              </li>
              
              <li class="sidebar-item" style="margin-top: 5px;">
                <a class="sidebar-link" href="/daftar" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Daftar Kontrakan</span>
                </a>
              </li>
              @if (auth()->user() && auth()->user()->role == 'admin')
              <li class="sidebar-item" style="margin-top: 5px;">
                <a class="sidebar-link" href="/daftar/create" aria-expanded="false">
                  <span>
                    <i class="ti ti-alert-circle"></i>
                  </span>
                  <span class="hide-menu">Tambah Daftar kontrakan</span>
                </a>
              </li>
              @endif
              <li class="sidebar-item" style="margin-top: 5px;">
                <a class="sidebar-link" href="/penghuni" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Daftar penghuni</span>
                </a>
              </li>
              @if (auth()->user() && auth()->user()->role == 'admin')
              <li class="sidebar-item" style="margin-top: 5px;">
                <a class="sidebar-link" href="/penghuni/create" aria-expanded="false">
                  <span>
                    <i class="ti ti-alert-circle"></i>
                  </span>
                  <span class="hide-menu">Tambah Daftar penghuni</span>
                </a>
              </li>
              <li class="sidebar-item" style="margin-top: 5px;">
                <a class="sidebar-link" href="/laporan" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Daftar Laporan</span>
                </a>
              </li>
              @endif
              <li class="sidebar-item" style="margin-top: 5px;">
                <a class="sidebar-link" href="/laporan/create" aria-expanded="false">
                  <span>
                    <i class="ti ti-alert-circle"></i>
                  </span>
                  <span class="hide-menu">Laporkan masalah</span>
                </a>
              </li>              
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
        
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
           
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <div style="margin-top: 15px; margin-right: 10px">
                <div class="flex-grow-1">
                  <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                  <small class="text-muted">{{ auth()->user()->role }}</small>
                </div>
              </div>
              <li class="nav-item dropdown">
                
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  
                  <img src="/modern/src/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">

                  <div class="message-body">
                 
                    <a href="/login"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                      class="btn btn-outline-primary mx-3 mt-2 d-block"
                      ><i class="bx bx-exit bx-md me-3"></i><span>Logout</span></a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="/modern/src/assets/jquery/dist/jquery.min.js"></script>
  <script src="/modern/src/assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/modern/src/assets/js/sidebarmenu.js"></script>
  <script src="/modern/src/assets/js/app.min.js"></script>
  <script src="/modern/src/assets/libs/simplebar/dist/simplebar.js"></script>
  @if (session('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
  @endif
</body>

</html>
