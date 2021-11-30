<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 text-center">
        <?php 
        error_reporting(0);
        include("db.php");
        $id=$_GET['timeslotId'];
        $sql = "DELETE  FROM timeslot WHERE timeslotId='$id'";
        $data = mysqli_query($conn,$sql);

        if ($data) {
            echo "<p class='lead success-text'>Time Slot was DELETED !</p>";            
        }else{
            echo "<p class='lead error-text'>ERROR!!</p>";
        }

        ?>
        <a class="btn btn-info btn-sm mt-3" href="DisplayTimeSlot.php">Go back to previous page</a>
    </div>
</body>
</html>