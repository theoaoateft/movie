<?php
    include ('db.php');
    $timeslotId = $_GET['timeslotId'];
    $qry = mysqli_query($conn, "select * from timeslot where timeslotId='$timeslotId'");
    $data = mysqli_fetch_array($qry);
    if(isset($_POST['update'])){
        $time = $_POST['time'];

        $edit = mysqli_query($conn, "update timeslot set time = '$time' where timeslotId = '$timeslotId'");
        if($edit){
            mysqli_close($conn);
            header("location:DisplayTimeSlot.php");
            exit;
        }else{
            echo mysqli_error($conn);
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        
    </body>
    </html>
    
    <div class="container--fluid px-5">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 form-container">
            <h3 class="text-center">Update TimeSlot</h3>
                <form action="" method="POST"enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">time</label>
                        <input type="text" class="form-control" name="time" placeholder="Enter time" value="<?php echo $data['time'] ?>">
                        <input type="submit" class="btn btn-info btn-block" name="update" value="Update">
                    </div>
                </form>
        </div>
    </div>