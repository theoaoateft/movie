<?php
    include ('db.php');
    $movieId= $_GET['movieId'];
    $qry = mysqli_query($conn, "select * from movielist where movieId='$movieId'");
    $data = mysqli_fetch_array($qry);
    if(isset($_POST['update'])){
        $Name=$_POST["Name"];
        $Genre=$_POST["Genre"];
        $Director=$_POST["Director"];
        $Description=$_POST["Description"];
        $imdb=$_POST["imdb"];
        //image upload
        $file_name=$_FILES["upload_file"]["name"];
        $temp_name=$_FILES["upload_file"]["tmp_name"];
        $dir=$uploadFolder;

        $edit = mysqli_query($conn, "update movielist set Name = '$Name', Genre = '$Genre',Director='$Director', Description='$Description', image='$file_name', imdb='$imdb' where movieId = '$movieId'");
        if($edit){
            mysqli_close($conn);
            header("location:DisplayMovies.php");
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
            <h3 class="text-center">Update Movie</h3>
                <form action="" method="POST"enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Movie Name</label>
                        <input type="text" class="form-control" name="Name" placeholder="Enter name" value="<?php echo $data['Name'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="cars">Genre:</label>
                        <select class="form-control form-control-lg" name="Genre">
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Crime">Crime</option>
                            <option value="Drama">Drama</option>
                          
                        </select>
                    </div>

                   

                    <div class="form-group">
                        <label for="">Director</label>
                        <input type="text" class="form-control" name="Director" placeholder="Enter Director" value="<?php echo $data['Director'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="Description" placeholder="Enter Description" value="<?php echo $data['Description'] ?>">
                    </div>


                  
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="number" class="form-control" name="imdb" placeholder="Enter rating" value="<?php echo $data['imdb'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Poster</label>
                        <input style="padding: 10px;" type="file" name="upload_file" required autofocus>
                    </div>

                    <input type="submit" class="btn btn-info btn-block" name="update" value="Update">
                </form>
        </div>
    </div>
