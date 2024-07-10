<?php
    session_start();
    include("connection.php");
    if(isset($_POST['login']))
    {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        if(empty($uname))
        {
            echo "<script>alert('Enter Username')</script>";
        }
        else if(empty($pass))
        {
            echo "<script>alert('Enter Password')</script>";
        }
        else 
        {
            $query = "SELECT * FROM seeker WHERE username='$uname'AND password='$pass'";
            $res = mysqli_query($connect,$query);
            if(mysqli_num_rows($res)==1)
            {
                header("Location: seeker/index.php");
                $_SESSION['seeker'] = $uname;
            }
            else
            {
                echo "<script>alert('Invalid Account')</script>";
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
    <title>Seeker Login Page</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div class="container fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center my-3">Seeker Login</h5>
                    <form method ="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control"
                               autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control"
                               autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-danger" value="Login">
                        <p>If do not have an account <a href="seeker_reg.php">Click Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>