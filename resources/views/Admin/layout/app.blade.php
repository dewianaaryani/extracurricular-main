<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') &mdash; SIM UPD & SENBUD</title>
  <meta name="author" content="email : aryanidewianarahmat@gmail.com">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin_assets/css/bs.min.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  @yield(
    'headScript'
  )
  <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin_assets/css/components.css')}}">

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('admin_assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{url('admin/logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SIM UPD & SENBUD</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{url('admin/')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>                
              </li>
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('koordinator.index')}}"><i class="fas fa-user"></i> <span>Koordinator</span></a></li>
                  <li><a class="nav-link" href="{{route('gurusenbud.index')}}"><i class="fas fa-user"></i> <span>Guru SENBUD</span></a></li>
                  <li><a class="nav-link" href="{{route('instruktur.index')}}"><i class="fas fa-user"></i> <span>Instruktur UPD</span></a></li>
                  <li><a class="nav-link" href="{{route('instrukturprod.index')}}"><i class="fas fa-user"></i> <span>Instruktur PROD</span></a></li>
                  <li><a class="nav-link" href="{{route('pjr.index')}}"><i class="fas fa-user"></i> <span>Pembimbing Rayon</span></a></li>
                  <li><a class="nav-link" href="{{route('student.index')}}"><i class="fas fa-user"></i> <span>Siswa</span></a></li>    
                </ul>
               <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>SENBUD & UPD</span></a>
                <ul class="dropdown-menu">                  
                  <li><a class="nav-link" href="{{route('senbud.index')}}"><i class="fas fa-drum"></i> <span>SENBUD</span></a></li>
                  <li><a class="nav-link" href="{{route('upd.index')}}"><i class="fas fa-basketball-ball"></i> <span>UPD</span></a></li>                  
                  <li><a class="nav-link" href="{{route('updprod.index')}}"><i class="fas fa-tv"></i> <span>UPD PROD</span></a></li>
                </ul>
               </li>
               <li class="nav-item\">                  
                <a href="{{route('admin.form.content')}}" class="nav-link" data-toggle=""><i class="fas fa-users"></i> <span>Content</span></a>                
               </li>
               <li class="nav-item dropdown">
                <a href="{{route('absen.index')}}" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Absen</span></a>
                <ul class="dropdown-menu">                  
                  <li><a class="nav-link" href="{{route('absen.index')}}"><i class="fas fa-drum"></i> <span>Absen Guru Senbud & UPD</span></a></li>    
                  <li><a class="nav-link" href="{{route('absenSiswa.index')}}"><i class="fas fa-drum"></i> <span>Absen Siswa</span></a></li>                                    
                </ul>
               </li>
              </li>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
            
            <div class="section-header-breadcrumb">
                @yield('breadcrumb')              
            </div>
          </div>

          <div class="section-body">
              @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('admin_assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{asset('/node_modules/prismjs/prism.js')}}"></script>
  <!-- Template JS File -->
  
  <script src="{{asset('admin_assets/js/scripts.js')}}"></script>
  <script src="{{asset('admin_assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('admin_assets/js/page/bootstrap-modal.js')}}"></script>
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
      } );
  </script>
  @yield(
    'bodyScript'
  )
</body>

@yield(
    'afterBodyScript'
  )
</html>
