<!doctype html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">

    <!-- Favicons -->
    <link href="../../assets/img/logo.png" rel="icon">
    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/styledash.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/trix.css">
    <script type="text/javascript" src="../../assets/js/trix.js"></script>
    <style>
    trix-toolbar [data-trix-button-group = "file-tools"]{
        display:none;
    }
    </style>
  </head>
  <body>
    @if(session()->has('addSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('addSuccess') }}
        </div>
    @endif
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
      <div class="sidebar-brand">
        <a href="/petani" style = "text-decoration: none;">
        <h4><span><img src="../../assets/img/logo.png" alt="sikeni"></span> <span>SIKENI</span></h4>
        </a>
      </div>
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="/petani" class="{{ ($title === "Dashboard-Petani") ? 'active' : '' }}"><span><i class="bi-speedometer2 active" style="font-size: 1.5rem;"></i></span>
              <span>Dashboard</span></a>
          </li>
          <li>
            <a href="/profilpetani" class="{{ ($title === "Profile-Petani") ? 'active' : '' }}"><span><i class="bi-person-circle active" style="font-size: 1.5rem; "></i></span>
              <span>Profile</span></a>
          </li>
          <li>
            <a href="/createjob" class="{{ ($title === "CreateJob-Petani") ? 'active' : '' }}"><span><i class="bi-x-diamond-fill active" style="font-size: 1.5rem; "></i></span>
              <span>Create Job</span></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-content">
      <header>
        <h4>
          <label for="nav-toggle" style = "cursor: pointer;">
            <span><i class="bi-list" style="font-size: 2rem; color: #ffff;"></i></span>
          </label>
            {{ $judul }}
        </h4>
        <form class="search-form d-flex align-items-center" action="/petanisearch" method="POST" action="#" style="margin: auto;">
          @csrf
          <div class="search-wrapper">
            <span><i class="bi-search" style="font-size: 1rem;"></i></span>
            <input name="search" type="search" placeholder="Search location"/>
          </div>
        </form>

        <nav class="header-nav ms-auto">
              <ul class="d-flex align-items-center">

                  <li class="nav-item dropdown pe-3">

                      <a class="nav-link d-flex align-items-center pe-0" href="/profil" data-bs-toggle="dropdown">
                        <div class="user-wrapper">
                          <img src="../../assets/img/profile.png" width="50px" height="50px"alt="">
                          <div>
                            <h6 class = "dropdown-toggle">{{ session("userLogined")["nama"] }}</h6>
                          </div>
                        </div>
                      </a><!-- End Profile Image Icon -->

                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                          <li class="dropdown-header">
                              <h6>{{ session("userLogined")["nama"] }}</h6>
                              <small>{{ session("userLogined")["userType"] }}</small>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="/profilpetani">
                                  <i class="bi bi-person"></i>
                                  <span>Profil Saya</span>
                              </a>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="/editprofilpetani">
                                  <i class="bi bi-gear"></i>
                                  <span>Edit Profil</span>
                              </a>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="/editpasspetani">
                                  <i class="bi bi-key"></i>
                                  <span>Ganti Kata Sandi</span>
                              </a>
                          </li>

                          <li>
                              <hr class="dropdown-divider">
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="/logoutpetani">
                                  <i class="bi bi-box-arrow-right"></i>
                                  <span>Logout</span>
                              </a>
                          </li>
                      </ul><!-- End Profile Dropdown Items -->
                  </li>
              </ul>
          </nav>
      </header>
      <main>
        @yield('main')
      </main>

      <!-- ======= Footer ======= -->
      <footer id="footer" class="footer">
          <div class="copyright">
              &copy; Copyright 2022. All Rights Reserved
          </div>
          <div class="credits">
              Designed by SIKENI 
          </div>
      </footer><!-- End Footer -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>