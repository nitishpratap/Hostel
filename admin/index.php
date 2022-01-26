<?php
include('includes/security.php');
include('includes/header.php'); 
include('includes/navbar.php');
require('../connection.php');//eshtablishing database connection
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Total Registered students -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Students</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h5>Boys: <?php $qu="SELECT sno FROM student_login WHERE gender='male'";
                                  $result=mysqli_query($con,$qu); 
                                  $reg_num=mysqli_num_rows($result);
                                  echo $reg_num;
                                  ?>
                </h5>
                <h5>Girls: <?php $qu="SELECT sno FROM student_login WHERE gender='female'";
                                  $result=mysqli_query($con,$qu); 
                                  $reg_num=mysqli_num_rows($result);
                                  echo $reg_num;
                                  ?>
                </h5>


              </div>
            </div>
            <div class="col-auto">
              <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total applied students -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Applied Students</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <!-- boys -->
                <h5>Boys:<?php             
                      $qu="SELECT sno FROM boys_details";
                      $result=mysqli_query($con,$qu); 
                      $num=mysqli_num_rows($result);
                      echo $num;
                 ?></h5>
                 <!-- girls -->
                 <h5>Girls:<?php             
                      $qu="SELECT sno FROM girls_details";
                      $result=mysqli_query($con,$qu); 
                      $num=mysqli_num_rows($result);
                      echo $num;
                 ?></h5>
              </div>
            </div>
            <div class="col-auto">
              <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- allocated -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Allocated</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><h5>Boys: <?php 
                          //allocated
                          $query1="SELECT sno FROM boys_details WHERE status='allocated'";
                          $result1=mysqli_query($con,$query1);
                          $num_allocated1=mysqli_num_rows($result1);
                          echo $num_allocated1;
                          ?>
                      <h5>Girls: <?php 
                          //allocated
                          $query1="SELECT sno FROM girls_details WHERE status='allocated'";
                          $result1=mysqli_query($con,$query1);
                          $num_allocated1=mysqli_num_rows($result1);
                          echo $num_allocated1;
                          ?>
                        </h5>

                      </div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2" style="display: none;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <h5>Boys:
                  <?php 
                    $query1="SELECT sno FROM boys_details WHERE status='pending'";
                    $result1=mysqli_query($con,$query1);
                    $num1=mysqli_num_rows($result1);
                    echo $num1;
                    ?>
                </h5>
                <h5>Girls:
                  <?php 
                    $query2="SELECT sno FROM girls_details WHERE status='pending'";
                    $result2=mysqli_query($con,$query2);
                    $num2=mysqli_num_rows($result2);
                    echo $num2;
                  ?>
                </h5>
              </div>
            </div>
            <div class="col-auto">
              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
mysqli_close($con);
include('includes/scripts.php');
include('includes/footer.php');
?>