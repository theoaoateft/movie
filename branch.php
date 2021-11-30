
  <?php
  if (!session_id()) {
    session_start();
  }
  include_once ('db.php');
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="#">

  <title>DarkWork Online Movie System</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="./movie_files/bootstrap.min.css" rel="stylesheet"> -->
  <link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>



  <!-- Custom styles for this template -->
   <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/rotating-card.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/anotherDefault.css" rel="stylesheet">
</head>
<!-- NAVBAR
  ================================================== -->
  <body style="background-color:black;">
    <div class="navbar-wrapper">
      <div class="">

        <nav class="navbar navbar-inverse"> 
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <!-- <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> -->
              </button>
              <a class="navbar-brand" href="index.php">Movie Ticket</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse float-right">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">DarkWorld</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="showtimes.php">Showtimes</a></li>
                
                <form class="navbar-form navbar-right" action="/action_page.php">
                    <div class="form-group">
                   <input type="text" class="form-control" placeholder="Search a movie">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>

                </li>
                <li><a href="javascript:void(0)" onclick="openLoginModal();"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
              </ul>
            </div>
            
          </div>
        </nav>

      </div>
    </div>

    <div class="col-lg-offset-2">
        <h1>Theatre Network</h1>
    </div>
    <div class="col-lg-offset-2">
        <div class="col-lg-3">
            <ul id="ul1">
                <h3 style="text-align: right;">Headquarter</h2>
                    <li id="b1"><a href="#">420 Cach Mang Thang 8, W.11, D. Tan Binh, Ho Chi Minh city</a></button>
                        <h3 style="text-align: right;">Ho Chi Minh city</h2>
                            <li id="b2"><a href="#">69 Tan Huong, W. Tan Quy, D. Tan Phu</a></li><br>
                            <li id="b3"><a href="#">215 Hoang Hoa Tham, W. 25, D. Binh Thanh</a></li><br>
                            <li id="b4"><a href="#">1240 Huynh Tan Phat, W. Phu My, D. 7</a></li>
                            <h3 style="text-align: right;">Ha Noi</h2>
                                <li id="b5"><a href="#">48 Ly Quoc Su, W. Hang Trong, D. Hoan Kiem</a></li><br>
                                <li id="b6"><a href="#">140 Tran Duy Hung, W. Trung Hoa, D. Cau Giay</a></li>
                                <h3 style="text-align: right;">Da Nang</h2>
                                    <li id="b7"><a href="#">35 Hoang Dieu, D. Hai Chau</a></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <div id="a1" class="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6591.6144063311585!2d106.67399176232203!3d10.780846221498399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed7b023986d%3A0xb165c5341f1d8470!2zQuG7h25oIFZp4buHbiDEkGEgS2hvYSBN4bqvdCBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1619354041965!5m2!1svi!2s"
                    width="700" height="650" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    

  <?php include 'footer.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/main.js"></script>
    
  </body>
  </html>