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
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="" method="POST">
                            <div class="from-group">
                                <label>Search Time Slot </label>
                                 <input type="text" name="txtsearch" class="form-control form-control-lg"
                                 placeholder="Type Time Slot..">
                                 <button type="submit" value="search" class="btn btn-primary">Search</button>
                            </div>    
                            
                        </form>
                    </div>
                    <h3 class="text-center">Time Slot Information</h3>    
                    <div class="row text-center">
                     <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thread>
                            <tr>
                                <th>TimeSlot Id</th>
                                <th>Time</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php

                                include "db.php"; // Using database connection file here
                                $sql = "SELECT * FROM timeslot";
                                // $records = mysqli_query($conn,"select * from timeslot"); // fetch data from database
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $search = $_POST["txtsearch"];
                                    $sql = "SELECT * FROM timeslot WHERE time LIKE '%" . $search . "%'";
                                }
                                    $records = mysqli_query($conn, $sql);
                                while($data = mysqli_fetch_array($records))
                                {
                                ?>
                                <tr>
                                    <td><?php echo $data['timeslotId']; ?></td>
                                    <td><?php echo $data['time']; ?></td>
                                    <td><a href="updateTimeSlot.php?timeslotId=<?php echo $data['timeslotId']; ?>"class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a onclick="return checkDelete()"href="deleteTimeSlot.php?timeslotId=<?php echo $data['timeslotId']; ?>"class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>	
                                <?php
                                }
                                ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div> <!--row-->
                                <script type="text/javascript">
                                function checkDelete(){
                                    return confirm("Bạn có chắc muốn xóa?");
                                }
                                </script>
        </div> <!--row-->
</div>
                </div>
              </div>
            </div>
              </div>
            </div>
        </div>

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


