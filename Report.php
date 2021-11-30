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
                <form action="" method="POST">
                
                    <table class="table table-bordered table-striped">
                        <tr>
                        <div class="from-group">
                            <label>Tìm Kiếm</label>
                                <input name="txtsearch" class="form-control form-control-lg"
                                placeholder="Nhập phim cần báo cáo">
                                <button type="submit" class="btn btn-primary">Xuất báo cáo</button>
                        </div>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $sql = "";
                            $search = $_POST['txtsearch'];
                            if (empty($search)) {
                                $sql = "SELECT showOrderId, date, theater, movieName, price FROM showorder";
                                $sum = "SELECT SUM(price) AS total FROM showorder";
                            } else {
                                $sql =  "SELECT showOrderId, date, theater, movieName, price FROM showorder WHERE theater LIKE '" . $search . "%' OR movieName LIKE '" . $search . "%'";
                                $sum = "SELECT SUM(price) AS total FROM showorder WHERE theater LIKE '" . $search . "%' OR movieName LIKE '" . $search . "%'";
                            }
                            $result = mysqli_query($conn, $sql);
                            $total = mysqli_query($conn, $sum);
                        }
                        ?>
                        </tr>
                        <h3 class="text-center">Report information</h3>    
                        <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Theater</th>
                                <th scope="col">Movie</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row["showOrderId"]; ?></td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <td><?php echo $row["theater"] ?></td>
                                        <td><?php echo $row["movieName"] ?></td>
                                        <td><?php echo $row["price"] ?></td>
                                    </tr>
                                    
                            <?php
                                }
                            ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>TOTAL</td>
                                    <td>
                                    <?php
                                    if ($total->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($total)) {
                                    ?>
                                        <?php echo $row["total"]?>
                                    </td>
                                    <?php
                            }}
                            ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } ?>
                    </table>
                </form>
                    
                            
            </div> <!--row-->
    </div>
                </div>
              </div>
            </div>
        
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
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