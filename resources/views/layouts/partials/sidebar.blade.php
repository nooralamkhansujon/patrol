   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-bg-dark sidebar-color-primary shadow">
       <div class="brand-container">
           <a href="javascript:;" class="brand-link">
               <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                   class="brand-image opacity-80 shadow">
               <span class="brand-text fw-light">| Patrol</span>
           </a>
           <a class="pushmenu mx-1" data-lte-toggle="sidebar-mini" href="javascript:;" role="button"><i
                   class="fas fa-angle-double-left"></i></a>
       </div>
       <!-- Sidebar -->
       <div class="sidebar">
           <nav class="mt-2">
               <!-- Sidebar Menu -->
               <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu"
                   data-accordion="false">
                   <li class="nav-item menu-open">
                       <a href="{{ route('home') }}" class="nav-link active">
                           <i class="nav-icon fas fa-home"></i>
                           <p>
                               Home
                           </p>
                       </a>
                   </li>
                   <li class="nav-item ">
                       <a href="javascript:;" class="nav-link ">
                           <i class="nav-icon fas fa-users"></i>
                           <p>
                               Organization
                               <i class="end fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('roles.index') }}" class="nav-link ">
                                   <i class="fa fa-unlock"></i>
                                   <p>Role Management</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('accounts.index') }}" class="nav-link ">
                                   <i class="fa fa-user"></i>
                                   <p>Accounts</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('patrolman.index') }}" class="nav-link ">
                                   <i class="fa fa-user"></i>
                                   <p>Patrolman</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('organizations.index') }}" class="nav-link ">
                                   <i class="fa fa-institution"></i>
                                   <p>Organization</p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item ">
                       <a href="javascript:;" class="nav-link ">
                           <i class="fa fa-asl-interpreting "></i>
                           <p>
                               Patrol Management
                               <i class="end fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('checkpoint.index') }}" class="nav-link ">
                                   <i class="fa fa-podcast"></i>
                                   <p>Checkpoint</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('routes.index') }}" class="nav-link ">
                                   <i class="fa fa-road"></i>
                                   <p>Route</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('patrol_task.index') }}" class="nav-link ">
                                   <i class="fa fa-shopping-basket"></i>
                                   <p>Patrol Task</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('device.index') }}" class="nav-link ">
                                   <i class="fa fa-microchip"></i>
                                   <p>Device</p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item ">
                       <a href="javascript:;" class="nav-link ">
                           <i class="fa fa-bar-chart"></i>
                           <p>
                               Check Records
                               <i class="end fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="#" class="nav-link ">
                                   <i class="fa fa-line-chart"></i>
                                   <p>Attendence</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#" class="nav-link ">
                                   <i class="fa fa-tasks"></i>
                                   <p>Task</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="" class="nav-link ">
                                   <i class="fa fa-bars"></i>
                                   <p>Task Details</p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item ">
                       <a href="javascript:;" class="nav-link ">
                           <i class="fa fa-gear"></i>
                           <p>
                               System
                               <i class="end fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="#" class="nav-link ">
                                   <i class="fa fa-book"></i>
                                   <p>Operation log</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="#" class="nav-link ">
                                   <i class="fa fa-envelope"></i>
                                   <p>Email</p>
                               </a>
                           </li>
                       </ul>
                   </li>
               </ul>
           </nav>
       </div>
       <!-- /.sidebar -->
   </aside>
