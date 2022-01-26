   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-hotel"></i>
  </div>
  <div class="sidebar-brand-text mx-3">CSJMU <sup>HOSTEL</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active" data-toggle="tooltip" data-placement="bottom" title="Dashboard">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="click to select Boys or Girls student">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
   
    <i class="fas fa-user-alt"></i>
    <span>Students</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Students:</h6>
      <a class="collapse-item" href="boys.php">Boys</a>
      <a class="collapse-item" href="girls.php">Girls</a>
    </div>
  </div>
</li>

<!-- student registration -->
<li class="nav-item">
  <a class="nav-link" href="Register_1.php">
    <i class="fas fa-user-plus"></i>
    <span>Student Registration</span></a>
</li>

<!-- change student password -->
<li class="nav-item">
  <a class="nav-link" href="changestudentpass.php">
    <i class="fas fa-key"></i>
    <span>Change Student Password</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="register.php">
    <i class="fa fa-cog fa-spin"></i>
    <span>Admin Profile</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fa fa-cog fa-spin"></i>
    <span>Grievance</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Team
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" data-toggle="tooltip" data-placement="bottom" title="Hello we are Designers & developers (click to know more about us)">
   <i class="fas fa-users-cog"></i>
    <span>Core Team</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Name:</h6>
      <a class="collapse-item" href="vibhay.php" data-toggle="tooltip" data-placement="bottom" title="VIBHAY KUMAR PATEL (click for more about me)">VIBHAY</a>
      <a class="collapse-item" href="ajit.php" data-toggle="tooltip" data-placement="bottom" title="AJIT PAL (click for more about me)">AJIT</a>
      <a class="collapse-item" href="amitabh.php" data-toggle="tooltip" data-placement="bottom" title="AMITABH KUMAR VISHWAKARMA (click for more about me)">AMITABH</a>
       <a class="collapse-item" href="ashish.php" data-toggle="tooltip" data-placement="bottom" title="ASHISH KUMAR (click for more about me)">ASHISH</a>
    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- topbar search -->
          <div class="input-group-append">
           <a href="search.php" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Search student by email">Search <i class="fas fa-search fa-sm"></i></a>
           
          </div>
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" data-toggle="tooltip" data-placement="bottom" title="Click for Profile & logout" style="text-transform: none;">
                  
               <?php echo $_SESSION['username'];?>
                  
                </span>
                <img class="img-profile rounded-circle"  data-toggle="tooltip" data-placement="bottom" title="Click for Profile & logout" src="img/img1.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php?email=<?php $_SESSION['username'];?>"  data-toggle="tooltip" data-placement="bottom" title="Click for Profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"  data-toggle="tooltip" data-placement="bottom" title="Click for logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="admin_logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>