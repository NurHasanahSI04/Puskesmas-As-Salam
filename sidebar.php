 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <img src="dist/img/logosalam.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Nur Hasanah</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Akun
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="akun_admin.php" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Admin</p>
                             </a>
                         </li>
                         
                     </ul>
                 </li>


             </ul>
         </nav>
         <!-- /.sidebar-menu -->
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="data_pasien.php" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Pasien</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="data_paramedik.php" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Paramedik</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="data_periksa.php" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Pemeriksaan</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="data_kelurahan.php" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Kelurahan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="data_unit_kerja.php" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Unit Kerja</p>
                             </a>
                         </li>
                         
                     </ul>
                 </li>
                 <li class="nav-header">AUTENTIKASI</li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->

        
     </div>
     <!-- /.sidebar -->
 </aside>