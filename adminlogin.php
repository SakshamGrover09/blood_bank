<?php
session_start();
include("connection.php");
if(isset($_POST['login'])){

    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $error = array();
    if(empty($username)){
        $error['admin'] = "Enter Username";
    }else if(empty($password)){
        $error['admin'] = "Enter Password";
    }
    if(count($error)==0){

        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('You have Login As an admin')</script>";
            $_SESSION['admin']  = $username;
            header("Location: admin/index.php");
            exit();
        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
  background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG4jpKFQyKxl6moHVPCAHpJ2HCQLBDAVMoJh-StU_4NWKmJ8Pkgo1KHt7iKuXg-jLznlo&usqp=CAU');
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
</head>


    <?php
     include("header.php");
    ?>
<h5 class="text-center my-2">Admin's Login </h5>
    <div style="margin-top: 20px;"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-3">
        </div>
                
                <div class="col-md-6 jumbotron">
                    
                    <form method="post" class="my-2">

                          <div >
                          
                           <?php
                           
                           if(isset($error['admin'])){

                              $sh = $error['admin'];


                               $show="<h4 class='alert alert-danger'>$sh</h4>";

                           }else{
                            $show = "";
                           }

                           echo $show;

                           ?>

                          </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control"
                            autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control"placeholder="Enter Password">
                        </div>

                        <input type="submit" name="login" class="btn btn-danger">
                        <!-- value="Login" -->

                    </form>
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    </div>

    
</body>
</html>