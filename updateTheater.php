<?php
    include ('db.php');
    $theaterId = $_GET['theaterId'];
    $qry = mysqli_query($conn, "select * from theater where theaterId='$theaterId'");
    $data = mysqli_fetch_array($qry);
    if(isset($_POST['update'])){
        $theaterName = $_POST['theaterName'];
        $seat = $_POST['seat'];
        $price = $_POST['price'];

        $edit = mysqli_query($conn, "update theater set theaterName = '$theaterName', seat = '$seat', price = '$price' where theaterId = '$theaterId'");
        if($edit){
            mysqli_close($conn);
            header("location:DisplayTheater.php");
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
            <h3 class="text-center">Update Theater</h3>
                <form action="" method="POST"enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">TheaterName</label>
                        <input type="text" class="form-control" name="theaterName" placeholder="Enter time" value="<?php echo $data['theaterName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Seat</label>
                        <input type="number" class="form-control" name="seat" placeholder="Enter seat" value="<?php echo $data['seat'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Ticket Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Ticket Price" value="<?php echo $data['price'] ?>">
                    </div>
                    <input type="submit" class="btn btn-info btn-block" name="update" value="Update">
                </form>
        </div>
    </div>
