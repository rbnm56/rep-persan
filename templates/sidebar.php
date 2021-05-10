 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="admin.php" class="brand-link">
     <!--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
     <span class="brand-text font-weight-light">Persan</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Administrador</a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
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
         <li class="nav-item menu-open">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
             <p>
               Usuarios
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="users-admin.php" class="nav-link">
                 <i class="far fa-tools nav-icon"></i>
                 <p> Administración</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-chart-pie nav-icon"></i>
                 <p> Reportes</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item menu-open">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-user-circle"></i>
             <p>
               Clientes
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="clientes.php" class="nav-link">
               <i class="far fas fa-file-alt nav-icon"></i>
                 <p> Todos</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link"  id="btnAbrirAgregar">
                 <i class="far fas fa-plus nav-icon"></i>
                 <p>Nuevo</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item menu-open">
           <a href="ventas.php" class="nav-link">
             <i class="nav-icon fas fa-dollar-sign"></i>
             <p>
               Ventas
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="#" class="nav-link">
             <i class="nav-icon far fa-file-alt"></i>
             <p>
               Reportes
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-tools nav-icon"></i>
                 <p> Administración</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-chart-pie nav-icon"></i>
                 <p> Reportes</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item menu-open">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-clipboard-list"></i>
             <p>
               Inventario
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-tools nav-icon"></i>
                 <p> Administración</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-chart-pie nav-icon"></i>
                 <p> Reportes</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="caja.php" class="nav-link">
             <i class="nav-icon fas fa-plus"></i>
             <p>
               Caja
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>