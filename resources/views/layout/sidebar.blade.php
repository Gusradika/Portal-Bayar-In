 <ul class="navbar-nav  bg-black  sidebar sidebar-dark accordion toggled" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class=" d-flex align-items-center justify-content-center" href="/dashboard">
         <div class="row mt-4 mb-4 mx-auto">
             {{-- <div class=" col-sm-3 d-sm-block d-none"><img class="img-fluid" src="asset/img/logo.png" alt="">
             </div> --}}
             <div class=" my-auto col-sm-12 d-none d-sm-block text-center"><img class="img-fluid w-75"
                     src="{{ url('/asset/img/cbt.png') }}" alt="">
             </div>

             <div class=" my-auto col-12 d-block d-sm-none text-center"><img class="img-fluid w-75"
                     src="{{ url('/asset/img/cbt.png') }}" alt="">
             </div>
         </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <div class="sidebar-heading">
         Home
     </div>
     @if (Auth()->user()->roles_id == 2 || Auth()->user()->roles_id == 1)
         <!-- Nav Item - Dashboard -->
         <li class="nav-item  {{ Request::is('dashboard') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="{{ route('view-dashboard') }}">
                 <i class="fas fa-fw fa-chart-line"></i>
                 <span>Dashboard</span></a>
         </li>
     @endif
     @if (Auth()->user()->roles_id == 3)
         <!-- Nav Item - Dashboard -->
         <li class="nav-item  {{ Request::is('home') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="#">
                 <i class="fa-solid fa-house"></i>
                 <span>Home</span></a>
         </li>
     @endif


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Menu
     </div>

     {{-- ADMIN --}}
     @if (Auth()->User()->roles_id == 1)
         <!-- Nav Item - Pages Collapse Menu -->

         <li class="nav-item {{ Request::is('user-list*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="{{ route('view-user-list') }}"> <i class="fa-solid fa-chalkboard-user"></i>
                 <span>List User</span></a>
         </li>

         <li class="nav-item {{ Request::is('tenant-list*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="{{ route('view-tenant-list') }}"><i class="fa-solid fa-book"></i>
                 <span>List Tenant</span></a>
         </li>

         <li class="nav-item {{ Request::is('seat-list*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="{{ route('view-seat-list') }}"><i class="fa-solid fa-school-flag"></i>
                 <span>List Seat</span></a>
         </li>

         <li class="nav-item {{ Request::is('reports*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="{{ route('view-report') }}"><i class="fa-solid fa-users"></i>
                 <span>Report and Analytic</span></a>
         </li>
         <li class="nav-item {{ Request::is('reports*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="{{ route('view-top-up') }}"><i class="fa-solid fa-users"></i>
                 <span>Top Up Saldo</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">
     @endif

     {{-- Tenant --}}
     @if (Auth()->User()->roles_id == 2)
         <li class="nav-item {{ Request::is('data-pengajar*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="#"> <i class="fa-solid fa-chalkboard-user"></i>
                 <span>List Transaksi</span></a>
         </li>

         <li class="nav-item {{ Request::is('data-mapel*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="#"><i class="fa-solid fa-book"></i>
                 <span>List Menu</span></a>
         </li>

         <li class="nav-item {{ Request::is('data-kelas*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="#"><i class="fa-solid fa-school-flag"></i>
                 <span>Report and Analytic</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
     @endif

     {{-- User --}}
     @if (Auth()->User()->roles_id == 3)
         <li class="nav-item {{ Request::is('data-pengajar*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="#"> <i class="fa-solid fa-chalkboard-user"></i>
                 <span>Scan QR Code</span></a>
         </li>

         <li class="nav-item {{ Request::is('data-mapel*') ? 'active' : '' }} animate-btn">
             <a class="nav-link" href="#"><i class="fa-solid fa-book"></i>
                 <span>History Transaksi</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
     @endif

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
