<?php
    include ('db.php');
    $userId= $_GET['userId'];
    $qry = mysqli_query($conn, "select * from user where userId='$userId'");
    $data = mysqli_fetch_array($qry);
    if(isset($_POST['update'])){
        $userName = $_POST['userName'];
        $status = $_POST['status'];

        $edit = mysqli_query($conn, "update user set userName = '$userName', status = '$status' where userId = '$userId'");
        if($edit){
            mysqli_close($conn);
            header("location:DisplayUser.php");
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
            <h3 class="text-center">Update User</h3>
                <form action="" method="POST"enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">UserName</label>
                        <input type="text" class="form-control" name="userName" placeholder="Enter name" value="<?php echo $data['userName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="number" class="form-control" name="status" placeholder="Enter status" value="<?php echo $data['status'] ?>">
                    </div>
                    <input type="submit" class="btn btn-info btn-block" name="update" value="Update">
                </form>
        </div>
    </div>
