  <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon rotate-n-15">
                   
                </div>
                <div class="sidebar-brand-text mx-3">presuniv</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ ($active) === "home" ? 'active' : '' }}">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt "></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            

            <!-- Heading -->
            <div class="sidebar-heading">
             
            </div>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php 
            switch ($active) {
            case "all users":
                echo "active";
                break;
            case "tickets":
                echo "active";
                break;
            default:
            echo "";

            } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </a>
                
                <div id="collapseTwo" class="collapse <?php 
            switch ($active) {
            case "all users":
                echo "show";
                break;
            case "tickets":
                echo "show";
                break;
            default:
            echo "";

            } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Table :</h6>                
                        <a class="collapse-item {{ ($active) === "all users" ? 'active' : '' }}" href="/dashboard/users">Employee</a>
                        <a class="collapse-item {{ ($active) === "tickets" ? 'active' : '' }}" href="/dashboard/tickets">Tickets</a>
                    </div>
                </div>
            </li>


            
            <li class="nav-item {{ ($active) === "myticket" ? 'active' : '' }}">
            
                <a class="nav-link" href='/dashboard/myticket'>
                     <i class="fas fa-fw fa-wrench"></i>
                    <span>My Ticket</span>
                </a>
                   

            </li>        
          

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            
            <li class="nav-item {{ ($active) === "myprofile" ? "active" : "" }}">
                <a class="nav-link" href='/dashboard/myprofile'>
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray"></i>
                    <span>Profile</span></a>
                   
            
            </li>        
                            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- End of Sidebar -->