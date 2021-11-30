<?php 
if (!session_id()) {
# code...
	session_start();
} 
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>


  <!-- Custom styles for this template -->
  <!-- Custom styles for this template -->
  <link href="css/rotating-card.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/anotherDefault.css" rel="stylesheet">
<style>
    	.btn:hover,
	.btn:focus,
	.btn:active{
		outline: 0 !important;
	}
/* entire container, keeps perspective */
.card-contain {
	  -webkit-perspective: 800px;
   -moz-perspective: 800px;
     -o-perspective: 800px;
        perspective: 800px;
        margin-bottom: 30px;
}



/* hide back of pane during swap */
.front {
	-webkit-backface-visibility: hidden;
   -moz-backface-visibility: hidden;
     -o-backface-visibility: hidden;
        backface-visibility: hidden;
	position: absolute;
	top: 0;
	left: 0;
	background-color: #FFF;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.14);
}

/* front pane, placed above back */
.front {
	z-index: 2;
}

/*        Style       */


.card{
    background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 4px;
    color: #444444;
}
.card-contain, .front, .back {
	width: 100%;
	height: 420px;
	border-radius: 4px;
}
.card .cover{
    height: 200px;
    overflow: hidden;
    border-radius: 4px 4px 0 0;
}
.card .cover img{
    width: 100%;
    max-height: 240px;
    min-height: 240px;
}

.card .content{
    background-color: rgba(0, 0, 0, 0);
    box-shadow: none;
    padding: 10px 20px 20px;
    text-align: left;
}

.card .name {
    font-size: 18px;
    /* line-height: 28px; */
    margin: 10px 0;
    text-transform: capitalize;
}
.card .profession{
    color: #444;
    /* margin-bottom: 20px; */
    margin: 0px 0px;
}


/*      Just for presentation        */
.butt{
    border-width: 2px;
    border-color: #3472F7;
    background-color: transparent;
    color: #3472F7;
    font-weight: 600;
    opacity: 0.7;
    filter: alpha(opacity=70);
    margin-bottom: 0;
    text-align: center;
}
.title{
    color: #506A85;
    text-align: center;
    font-weight: 300;
    font-size: 44px;
    margin-bottom: 90px;
    line-height: 90%;
}
.title small{
    font-size: 17px;
    color: #999;
    text-transform: uppercase;
    margin: 0;
}
.butt{
    font-size: 12px;
    border-radius: 3px;
    padding: 1px 5px;
    line-height: 1.5;
    display: block;
    width: 85%;
    left: 50%;
    position: absolute;
    bottom: 6px;
    -ms-transform: translate(-50%);
  transform: translate(-50%);
}
</style>
</head>
<body>

<div class="panel panel-info">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
        <h2 style="color: black; text-align: center" >Choose your Popcorns and Drinks</h2>
        <p id="demo"></p>
        </ul>
    </div>

    <div class="panel-body">
        <div class="tab-content">
        <div class="tab-pane fade in active" id="nowshowing">
            <?php 
            $count=0;
            $res=$conn->query("select * from foodlist");
            while ($row=$res->fetch_object()) {
                $_SESSION['movie']=$row->id;
                $name = explode(" ",$row->name);
                $name = join("-",$name);
                if ($count==4) {
                echo "<div class='row'>";
                $count=0;
                }
                echo " 
                <div class='col-md-3 col-sm-12'>
                    <div class='card-contain'>
                        <div class='card'>
                            <div class='front'>
                                <div  class='cover'>
                                    <img src='uploadimages/".$row->img."' style='width=100%; height='120px'>
                                </div>
                            <div class='content'>
                                <div class='main'>
                                    <h3 class='name'>".$row->name ."</h3>
                                    <p class='profession'><b>Price: </b>".$row->price ."</p>
                                    <p class='profession'><b>Description: </b>".$row->description ."</p>
                                </div>
                            </div>
                                <div class='cen'> 
                                    <button onclick='add(this.id)' id=".$name." class='btn btn-primary butt'>Add</button>                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
                $count++;
            } ?> 
            </div> 
        </div>
        </div>
</div>

</body>
</html>