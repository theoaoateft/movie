<?php 
/*if (!session_id()) {
	# code...
	session_start();
}*/

$host="localhost";
$username="root";
$password="";
$db_name="movieDb";
$uploadFolder="C:\\xampp\\htdocs\\movie\\upload\\";
    $linkUpload="http://localhost/movie/upload/";
    $avatarDefault="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png";
// Create connection
$conn = new mysqli($host, $username, $password,$db_name);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else{
	
}
?>
