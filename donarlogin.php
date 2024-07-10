<?php
session_start();
    include("connection.php");
    if (isset($_POST['login'])) {
        
        $uname=$_POST['uname'];
        $password=$_POST['pass'];

        $error=array();

        $q="SELECT * FROM donars WHERE username='$uname' AND password='$password' ";
        $qq=mysqli_query($connect,$q);
        $row=mysqli_fetch_array($qq);

        if (empty($uname)) {
            $error['login']="Enter Username";
        }else 
        if (empty($password)) {
            $error['login']="Enter Password";
        }

        if (count($error)==0) {
            $query="SELECT * FROM donars WHERE username='$uname' AND password='$password'";
            $res=mysqli_query($connect,$query);
            if (mysqli_num_rows($res)==1) 
            {
                echo "<script> alert('You are logged in as Donar')</script>"; 
                header("Location: donar/index.php");
                $_SESSION['donar'] = $uname;
            }
            else{
                    echo "<script> alert('Invalid Account')</script>"; 
                }
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG4jpKFQyKxl6moHVPCAHpJ2HCQLBDAVMoJh-StU_4NWKmJ8Pkgo1KHt7iKuXg-jLznlo&usqp=CAU');
}
</style>
    
    <title>Donar Login Page</title>
</head>


<?php

include("header.php");

?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-3">
        </div>
    <div class="col-md-6 jumbotron my-3"> 
    <h5 class="text-center my-2">Donar's Login </h5>
     <div>
    <!-- <?php echo $show; ?> -->
    </div>

    <form method="post">
    <div class="form-group">
            <label>Username </label>
            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">


    </div>
     <div class="form-group">
    <label>Password </label>
    <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">

    </div>
   <input type="submit" name="login" class="btn btn-danger" value="Login" >

    <p>I dont have an account <a href="donar_reg.php">Apply Now!!!</a> </p>

</form>


</div>
<div class="col-md-3">


</div>


</div>



</div>

</div>

    
</body>
</html>