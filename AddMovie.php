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
                <form id="contact" action="AddMovie.php" method="post" enctype="multipart/form-data">
                  <h4 class="card-title">Add Movie</h4>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="Name" class="form-control form-control-lg" placeholder="Movie" aria-label="Username">
                    </div>
                   
                    <div class="form-group">
                        <label for="cars">Genre:</label>
                        <select class="form-control form-control-lg" name="Genre">
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Crime">Crime</option>
                            <option value="Drama">Drama</option>
                          
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Rating</label>
                        <input type="text" name="imdb" class="form-control form-control-lg" placeholder="Rating" aria-label="Username">
                    </div>

                    <div class="form-group">
                        <label>Director</label>
                        <input type="text" name="Director" class="form-control form-control-lg" placeholder="Rating" aria-label="Username">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input name="Description" placeholder="description" type="textArea" tabindex="1" required></input>
                    </div>

                    <div class="form-group">
                        <label>Poster</label>
                        <input style="padding: 10px;" type="file" name="upload_file" required autofocus>
                    </div>
                    
                   
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" >
                  </div>
                </form>

                
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

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Getting from input values
        $Name=$_POST["Name"];
        $Genre=$_POST["Genre"];
        $Director=$_POST["Director"];
        $Description=$_POST["Description"];
        $imdb=$_POST["imdb"];
        //image upload
        $file_name=$_FILES["upload_file"]["name"];
        $temp_name=$_FILES["upload_file"]["tmp_name"];
        $dir=$uploadFolder;

        move_uploaded_file($temp_name,$dir.$file_name);
        
        //validation
        if($Name!="" && $Genre !="" && $Director !="" && $Description !="" && $imdb !=""){
            //sql statement
            $sql="INSERT INTO movielist (Name, Genre, Director, Description, image, imdb) VALUES ('$Name','$Genre','$Director','$Description','$file_name','$imdb')";
            $data=mysqli_query($conn,$sql);
            if($data){
                echo "<p class='text-center success-text mt-2'> Movie is Added </p>";
            
            }
            }else{
                echo "<p class='text-center error-text mt-2'> Xem lại thông tin đầu vào </p>";

        }
      }
?>