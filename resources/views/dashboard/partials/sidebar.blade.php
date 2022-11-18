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
                Tables
            </div>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php 
            switch ($active) {
            case "BA":
                echo "active";
                break;
            case "BB":
                echo "active";
                break;
             case "BC":
                echo "active";
                break;
            default:
            echo "";

            } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                        </svg>
                    </i>
                    <span>Buildings</span>
                </a>
                
                <div id="collapseTwo" class="collapse <?php 
            switch ($active) {
            case "BA":
                echo "show";
                break;
            case "BB":
                echo "show";
                break;
             case "BC":
                echo "show";
                break;
            default:
            echo "";

            } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Table :</h6>                
                        <a class="collapse-item {{ ($active) === "BA" ? 'active' : '' }}" href="/building_a">Building A</a>
                        <a class="collapse-item {{ ($active) === "BB" ? 'active' : '' }}" href="/building_b">Building B</a>
                        <a class="collapse-item {{ ($active) === "BC" ? 'active' : '' }}" href="/building_c">Building C</a>
                    </div>
                </div>
            </li>


            <li class="nav-item 
             <?php 
            switch ($active) {
            case "all tickets":
                echo "active";
                break;
            case "my tickets":
                echo "active";
                break;
            default:
            echo "";
            } ?>
            
            ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Tickets</span>
                </a>
                <div id="collapseUtilities" class="collapse 
                 <?php 
            switch ($active) {
            case "all tickets":
                echo "show";
                break;
            case "my tickets":
                echo "show";
                break;
            default:
            echo "";
            } ?>
                " aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">TABLE :</h6>
                        <a class="collapse-item {{ ($active) === "all tickets" ? 'active' : '' }}" href="alltickets">All Tickets</a>
                        <a class="collapse-item {{ ($active) === "my tickets" ? 'active' : '' }}" href="/mytickets">My Tickets</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ ($active) === "all users" ? 'active' : '' }}">
            
                <a class="nav-link" href='/allusers'>
                    <i ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg></i>
                    <span>Users</span>
                </a>
                   
            
            </li>        
          

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            
            <li class="nav-item">
            
                <a class="nav-link" href='/'>
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
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