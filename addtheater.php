<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
    include "top-nav.php";
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <?php include "right-bar.php"; ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include "left-bar.php"; ?>
      <!-- partial -->
      <?php include "db.php"; ?>
      <div class="main-panel">
        
        <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form action="AddTheater.php" method="post" enctype="multipart/form-data">
                  <h4 class="card-title">Add a new Theater</h4>
                    <div class="form-group">
                        <label>Theater Name</label>
                        <input type="text" name="theaterName" class="form-control form-control-lg" placeholder="Add new Theater" aria-label="Username">
                    </div>
                   
                    <div class="form-group">
                        <label>Number of seat</label>
                        <input type="text" name="seat" class="form-control form-control-lg" placeholder="Number of seats" aria-label="Username">
                    </div>
                    
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control form-control-lg" placeholder="Ticket Price" aria-label="Username">
                    </div>

                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" >
                  </div>
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $theaterName=$_POST["theaterName"];
                        $seat=$_POST["seat"];
                        $price=$_POST["price"];
                     
                        
                        //$role=intval($_POST["txtrole"]); //convert String --> Integer
                       
                        $sql="INSERT INTO theater (theaterName, seat,price) VALUES  ('$theaterName','$seat','$price')";
                    
                        $data=mysqli_query($conn,$sql);
                        if($data){
                            echo "<p class='text-center success-text mt-2'> Theater is Added </p>";
                
                          
                        }else{
                            echo "<p class='text-center error-text mt-2'> Xem lại thông tin đầu vào </p>";
    
                        }
                    }
                ?>
                </div>
              </div>
            </div>
        </div>

        </div>
        <?php
         
        ?>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <?php include "footer1.php"; ?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>