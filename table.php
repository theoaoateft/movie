<?php 
include 'db.php';
if (!session_id()) {
	session_start();
}
if (!(($_SESSION['user'])==1)) {
	header('Location: index.php');
}
?>

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
<style>
    /* customize table */
.table th, .table td {
  white-space: normal;
}
</style>
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
      <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Time slot Table</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                        
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
                                                <script type="text/javascript">
                                                    function checkDelete(){
                                                        return confirm("Bạn có chắc muốn xóa?");
                                                    }
                                                    </script>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Theater Table</h4>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Theater Id</th>
                                                <th>Theater Name</th>
                                                <th>Number of Seats</th>
                                                <th>Ticket Price</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                             <?php  
                                            $sql = "SELECT * FROM theater";
                                            // $records = mysqli_query($conn,"select * from theater"); // fetch data from database
                                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                                $search = $_POST["txtsearch"];
                                                $sql = "SELECT * FROM theater WHERE theaterName LIKE '%" . $search . "%'";
                                            }
                                              $records = mysqli_query($conn, $sql);
                                            while($data = mysqli_fetch_array($records))
                                            {
                                            ?>
                                              <tr>
                                                <td><?php echo $data['theaterId']; ?></td>
                                                <td><?php echo $data['theaterName']; ?></td>
                                                <td><?php echo $data['seat']?></td>
                                                <td><?php echo $data['price']?></td>
                                                <td><a href="updateTheater.php?theaterId=<?php echo $data['theaterId']; ?>"class="btn btn-primary btn-sm">Edit</a></td>
                                                <td><a onclick="return checkDelete()"href="deleteTheater.php?theaterId=<?php echo $data['theaterId']; ?>"class="btn btn-danger btn-sm">Delete</a></td>
                                              </tr>	
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Users Table</h4>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <thead>
                                                <tr>
                                                    <th>userId</th>
                                                    <th>userName</th>
                                                    <th>status</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                              include "db.php"; // Using database connection file here
                  
                                          $records = mysqli_query($conn,"select * from user"); // fetch data from database
                  
                                          while($data = mysqli_fetch_array($records))
                                          {
                                          ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $data['userId']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['userName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['status']?>
                                                        </td>
                                                        <td><a href="updateUser.php?userId=<?php echo $data['userId']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                                                        <td><a onclick="return checkDelete()" href="deleteUser.php?userId=<?php echo $data['userId']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                    </tr>
                                                    <?php
                                              }
                                              ?>
                                              <script type="text/javascript">
                                                    function checkDelete(){
                                                        return confirm("Bạn có chắc muốn xóa?");
                                                    }
                                                </script>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Movies List Table</h4>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width:5%">Movie ID</th>
                                                <th>Name</th>
                                                <th>Genre</th>
                                                <th>Director</th>
                                                <th class="test">Description</th>
                                                <th>Image</th>
                                                <th>imdb</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $sql = "SELECT * FROM movielist";
                                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                                    $search = $_POST["txtsearch"];
                                                    // $search2 = $_POST["txtsearch"];
                                                    // $search3 = $_POST["txtsearch"];
                                                    $sql = "SELECT * FROM movielist WHERE Name LIKE '%" . $search . "%'";
                                                }
                                                $records = mysqli_query($conn, $sql);
                                                //loop starts here
                                                while($data = mysqli_fetch_array($records)){ ?>
                                                <tr>
                                                    <td><?php echo $data['movieId']; ?></td>
                                                    <td><?php echo $data['Name']; ?></td>
                                                    <td><?php echo $data['Genre']; ?></td>
                                                    <td><?php echo $data['Director']; ?></td>
                                                    <td><?php echo $data['Description']; ?></td>
                                                    <td><img src="upload/<?php echo $data['image']; ?>" width="100" height="100"></td>
                                                    <td><?php echo $data['imdb']; ?></td>
                                                    
                                                    <td><a href="updateMovie.php?movieId=<?php echo $data['movieId'];?>"
                                                            class="btn btn-primary btn-sm">Edit</a> </td>  
                                                    <td><a onclick="return checkDelete()" href="deleteMovie.php?movieId=<?php echo $data['movieId']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                    
                                                </tr>
                                      <?php
                                    }   
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <?php include "footer.php"; ?>
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