<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">

<title>Online Movie Tickets Management System</title>

<!-- Bootstrap core CSS -->
<!-- <link href="./movie_files/bootstrap.min.css" rel="stylesheet"> -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<!-- NAVBAR
  ================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="">

        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Movie Ticket</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse float-right">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="showtimes.php">Showtimes</a></li>

              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </li>
                <li><a href="javascript:void(0)" onclick="openLoginModal();"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
              </ul>
            </div>
            
          </div>
        </nav>

      </div>
    </div>


    <section class="showtime_page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p style="font-size: 3vw; font-weight: bold;text-align: center;">Movie Ticket is build For DARKWORLD project.
            </p>
            <p>DarkWorld Cinema is a fantastic movie distributor and theatre owner. Our goal is to become a role model firm for the film industry's continued development. We have improved a unique concept for repurposing former multiplexes where consumers can not only watch movies but also participate in a variety of other activities. At DarkWorld Cinema, we use cutting-edge technology, and completely new and unique food and beverage options. All while maintaining the greatest level of service from the team.
Our activities, as well as our support of major film festivals, are aimed at creating and developing platforms for discovering and identifying talented filmmakers. Through some excellent projects, we are also committed to offering movie-going experiences to consumers that currently have limited access to a high-quality cinema atmosphere.
Furthermore, DarkWorld Cinema operates under a transparent and professional framework that assures that all business partners are treated fairly. DarkWorld Cinema will continue its path to a prosperous future in the film industry with the help of our devoted audiences, filmmakers, and business partners.
</p>
            
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <div class="container">
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
       
      </footer>
    </div>


    <div class="modal fade login" id="loginModal">
      <div class="modal-dialog login animated">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Login with</h4>
          </div>
          <div class="modal-body">  
            <div class="box">
              <div class="content">
                <div class="social">
                  <a class="circle github" href="/auth/github">
                    <i class="fa fa-github fa-fw"></i>
                  </a>
                  <a id="google_login" class="circle google" href="/auth/google_oauth2">
                    <i class="fa fa-google-plus fa-fw"></i>
                  </a>
                  <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                    <i class="fa fa-facebook fa-fw"></i>
                  </a>
                </div>
                <div class="division">
                  <div class="line l"></div>
                  <span>or</span>
                  <div class="line r"></div>
                </div>
                <div class="error"></div>
                <div class="form loginBox">
                  <form method="post" action="/login" accept-charset="UTF-8">
                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                  </form>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="content registerBox" style="display:none;">
                <div class="form">
                  <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                    <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                    <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="forgot login-footer">
              <span>Looking to 
                <a href="javascript: showRegisterForm();">create an account</a>
                ?</span>
              </div>
              <div class="forgot register-footer" style="display:none">
                <span>Already have an account?</span>
                <a href="javascript: showLoginForm();">Login</a>
              </div>
            </div>        
          </div>
        </div>
      </div>


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
