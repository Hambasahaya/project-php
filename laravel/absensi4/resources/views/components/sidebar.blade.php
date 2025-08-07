 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"
     style='background: #F869D2 ;
background: -webkit-linear-gradient(207deg, rgba(248, 105, 210, 1) 100%, rgba(235, 101, 116, 1) 75%);
background: -moz-linear-gradient(207deg, rgba(248, 105, 210, 1) 100%, rgba(235, 101, 116, 1) 75%);
background: linear-gradient(207deg, rgba(248, 105, 210, 1) 100%, rgba(235, 101, 116, 1) 75%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#F869D2", endColorstr="#EB6574", GradientType=0);'>
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
         <div class="sidebar-brand-icon rotate-n-1">
             <i><img src="/img/logowini.jpeg" alt="" class="rounded-5" srcset="" width="55px"></i>
         </div>
         <div class="sidebar-brand-text mx-3">SnapAbsen</div>
     </a>
     <hr class="sidebar-divider my-0">
     <li class="nav-item">
         <a class="nav-link" href="/admin">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Menu
     </div>
     @if(Auth::user()->role==="admin")
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Kelas</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Kelas Menu</h6>
                 <a class="collapse-item" href="{{route('adminkelas')}}">Data Kelas</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Mata Kuliah</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Menu Mata Kuliah</h6>
                 <a class="collapse-item" href="/adminmatakuliah">Data Mata Kuliah</a>
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">

     <div class="sidebar-heading">
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
             aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Data User</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Data Mahasiswa/Dosen</h6>
                 <a class="collapse-item" href="{{route('adminMhs')}}">Data Mahasiswa</a>
                 <a class="collapse-item" href="{{route('adminDosen')}}">Data Dosen</a>
             </div>
         </div>
     </li>
     @endif
     @if(Auth::user()->role==="dosen")
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Kelas</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Kelas Menu</h6>
                 <a class="collapse-item" href="{{route('dosen.jadwal')}}">Data jadwal Mengajar</a>
                 <a class="collapse-item" href="{{route('dosen.mhs.kelas')}}">Data Mahasiswa Kelas</a>
                 <a class="collapse-item" href="{{route('dosen.mhs.kelas.absen')}}">Data Absen Kelas</a>
             </div>
         </div>
     </li>
     <hr class="sidebar-divider">

     <div class="sidebar-heading">
     </div>
     @endif
     <hr class="sidebar-divider d-none d-md-block">
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>