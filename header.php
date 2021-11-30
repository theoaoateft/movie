<?php 
if (!session_id()) {
	session_start();
} 
include 'db.php';
if (empty($_SESSION['user'])) {
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="js/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />

	<style type="text/css">
		.fontColor{
			color: white;
			font-size: 1.0vw;
		}
	</style>
</head>
<body>
<div id="logo" class="col-lg-4">
                <img src="images/logo.jpg" width="25%">
            </div>

	<!-- header-section-starts -->
	<div class="header">
		<div class="navbar-wrapper">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<?php 
						$userId=$_SESSION['user'];
						$res=$conn->query("select * from user where userId='$userId';");
						$row=$res->fetch_object();

						echo "
						<H1 > MANAGERMENT PAGE   </H1>";
						echo "
						<li ><a href='#'> You are a <span class='glyphicon glyphicon-user'>  </span>". strtoupper($row->userName)."</a></li>"
						
						?>	
					</ul>
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a class="fontColor" href="logout.php"> <span class='glyphicon glyphicon-off'> Logout </a>	
						
					</div>
				</div>
				<div class="clearfix"> </div> 
			</div>
		</div>
	</div>

</body>
</html>


