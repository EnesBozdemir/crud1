<?php
    include("connect.php");

    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
        $result=$conn->query($sql);

        if($result==false){
            echo "Kayıt eklenemedi";
        }
    }

    $sqlview="SELECT * FROM `users`";

    $resultview=$conn->query($sqlview);

    if(isset($_GET["id"])){
        $userid=$_GET["id"];

        $sqldelete="DELETE FROM `users` WHERE `id`='$userid'";

        $resultdelete=$conn->query($sqldelete);

        header("location:index.php");
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Crud Application</title>
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6" style="margin: 50px;">
                <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="md-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="*******">
                    </div>
                    <div class="col-auto" style="margin-top: 20px;">
                        <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h2>Users</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                        if($resultview->num_rows>0){
                            while($row=$resultview->fetch_assoc()){
                    ?>

                    <tr>
                        <th><?php echo $i;?></th>
                        <th><?php echo $row["name"];?></th>
                        <th><?php echo $row["email"];?></th>
                        <th><?php echo $row["password"];?></th>
                        <th><a href="index.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a></th>
                    </tr>
                    <?php   $i++; 
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
        </div>
        </div>
        
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>