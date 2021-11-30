<?php 
if (!session_id()) {
	session_start();
} 
include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/customerPanel.css">
	<link href="bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />

	<style type="text/css">
		.boxStyle{width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-style: normal;
			font-variant-ligatures: normal;
			font-variant-caps: normal;
			font-variant-numeric: normal;
			font-weight: 400;
			font-stretch: normal;
			font-size: 12px;
			line-height: 16px;
			font-family: Roboto, Helvetica, Arial, sans-serif;
			
		}
	</style>
	  <!-- <link href="./movie_files/bootstrap.min.css" rel="stylesheet"> -->
	  <link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

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
<body>
<?php include_once 'customerHeader.php'; ?> <br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12  toppad" >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<?php 
//for time slot
							//$timeSlot=$conn->query("select time from timeslot");	
//movie details
							$movieId=$_POST['movieId'];	
							$_SESSION['movieId']=$movieId;
							$res=$conn->query("select * from movielist where movieId=$movieId;");
							$row=$res->fetch_object();

							echo "".$row->Name;?>
						</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 col-lg-4 ">
								<img alt="User Pic" src=<?php echo '"uploadimages/'.$row->image.'"';?> class=" img-responsive"> 
							</div>
							<div class=" col-md-8 col-lg-8 "> 
								<table class="table table-user-information">
									<tbody>
										<tr>
											<td><strong>Movie Name </strong></td>
											<td><?php echo "".$row->Name;?> </td>
										</tr>
										<tr>
											<td><strong>Genre</strong></td>
											<td> <?php echo "".$row->Genre;?> </td>
										</tr>
										<tr>
											<td><strong>Director</strong></td>
											<td><?php echo "".$row->Director;?> </td>
										</tr>
										<tr>
											<td><strong>IMDB</strong></td>
											<td><?php echo "".$row->imdb;?> </td>
										</tr>
										<tr>
											<td><strong>Description</strong></td>
											<td><?php echo "".$row->Description;	?> </td>
										</tr>
										<form action="ticketConfirmation.php" method="post">
											<tr>
												<td><strong>Food</strong></td>											
												<td id="cont"><div id="no">None chosen</div></td>
												<td><input type='hidden' id="fname" name='fname'></td>
											</tr>
											<tr>
												<td><strong>Food price</strong></td>
												<td><p id="pr">Please choose your food in the menu below</p><button onclick="rech()" id="butt" style="display: none;" class="btn btn-dark btn-xs">Rechoose</button></td>
												<input type='hidden' id="fprice" name='fprice'>
											</tr>
											<tr>
												<td><strong>Date</strong></td>
												<td><input class="boxStyle" type="date" name="date"></td>
											</tr>
											<tr>

												<td><strong>Show Time</strong></td>
												<td>  
													<select name="timeSlot" class="boxStyle"> 
														<?php $timeSlot=$conn->query("select time from timeslot"); 
														while ($showTime=$timeSlot->fetch_object()) {
															echo " <option value='".$showTime->time."'>". $showTime->time."</option>";
														} ?> 
													</select>
												</td>
											</tr>
											<tr>
												<td><strong>Theater</strong></td>
												<td>
													<select name="theater" class="boxStyle"> 
														<?php $resourse=$conn->query("select theaterName from theater"); 
														while ($theater=$resourse->fetch_object()) {
															echo " <option value='".$theater->theaterName."'>". $theater->theaterName."</option>";
														} ?> 
												</td>
											</tr>	
											<tr>									
												<td colspan="2" width="100%">
													<input class="btn btn-primary btn-xs btn-block" type="submit" name="submit" value="Request For Ticket">
												</td>
											</tr>
										</form>
											</tbody>
										</table>

									</div>-
								</div>

							</div>
						</div>
						<div class="row">
							<?php include("Food.php"); ?>
						</div>
					</div>
		</div>
				</div>
	</div>
			</div>
			
<script>
	var p = 0;
	var x = document.getElementById("no");
	var z = document.getElementById("cont");   
	var a = document.getElementById("pr");
	var b = document.getElementById("butt");
	var c = document.getElementById("fname");
	var d = document.getElementById("fprice")
	function add(clicked_id){ 
		switch(clicked_id){
			case "Combo-#1":
				p += 150000;
				break;
			case "Combo-#2":
				p += 100000;
				break;
			case "Sweet-Popcorn":
				p += 75000;
				break;
			case "Soft-drink":
				p += 50000;
				break;
		}
		clicked_id = clicked_id.replace("-"," ");
		if (x.style.display === "block" || b.style.display === "none") {
			x.style.display = "none";
			b.style.display = "block";
		} else {
			x.style.display = "none";
			b.style.display = "block";
		}
		z.innerHTML += clicked_id += " ";
		a.innerHTML = p;
		c.value += clicked_id += " ";
		d.value = p;
	}
    
	function rech(){
		if (x.style.display === "none") {
			x.style.display = "block";
			b.style.display = "none";
		} else{ 
			x.style.display = "block";
			b.style.display = "none";
		}
		z.innerHTML = "";
		a.innerHTML = "Please choose your food in the menu below";
		p = 0;
	}
</script>
.juhejpfjsijsvdsnvj
</body>

</html>