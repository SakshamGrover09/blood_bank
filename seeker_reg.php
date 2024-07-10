<?php

include("connection.php");

if (isset($_POST['apply'])) {

    $name=$_POST['name'];
    $blood_group=$_POST['blood'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $password=$_POST['pass'];
    $confirm_password=$_POST['con_pass'];
    $age=$_POST['age'];

    $q="SELECT * FROM seeker where username='$username'";
    $valid=mysqli_query($connect,$q);
    if(mysqli_num_rows($valid)==1){
    echo "<script>alert('Username Already in use')</script>";
    }else {
        
    

    $error=array();

    $c1=0; $c2=0; $c3=0;
    for($i=0; $i<strlen($email); $i++)
    {
        if($email[$i]=='@') $c1++;
        if($email[$i]=='.') $c3++;
        if($email[$i]=='.' && $c1==1) $c2++; 
    }

    $n1=0; $n2=0; $n3=0; $n4=0; $n5=0;
    for($i=0; $i<strlen($password); $i++)
    {
        if($password[$i]>='a' && $password[$i]<='z') $n1++;
        else if($password[$i]>='A' && $password[$i]<='Z') $n2++;
        else if($password[$i]>='0' && $password[$i]<='9') $n3++;
        else if($password[$i]==' ') $n4++;
        else $n5++;
    }

    if (empty($name)) {
        $error['apply']="Enter Name";
    }else 
    if (empty($age)) {
        $error['apply']="Enter Age";
    }
    else if (empty($username)) {
        $error['apply']="Enter Username";
    }else if (empty($email)) {
        $error['apply']="Enter Email Address";
    }else if($c1!=1 || $c2!=1 || $c3!=1){
        $error['apply']="Invalid Email";
    }else if ($gender=="") {
        $error['apply']="Select your Gender";
    }else if (empty($blood_group)) {
        $error['apply']="Select Blood Group";
    }else if (empty($phone)) {
        $error['apply']="Enter Phone Number";
    }else if(strlen($phone)!=10){
        $error['apply']="Invalid Phone Number";
    }else if ($country=="") {
        $error['apply']="Select your Country";
    }else if (empty($password)) {
        $error['apply']="Enter Password";
    }else if(strlen($password)<8){
        $error['apply']="Password must have atleast 8 characters";
    }else if($n4>0){
            $error['apply']="Password must not have empty spaces";
    }
    else if($n1==0){
        $error['apply']="Password must contain atleast one lowercase letter";
    }
    else if($n2==0){
        $error['apply']="Password must contain atleast one uppercase letter";
    }
    else if($n3==0){
        $error['apply']="Password must contain atleast one numeric character";
    }
    else if($n5==0){
        $error['apply']="Password must contain atleast one special character";
    }
    else if($confirm_password!=$password){
        $error['apply']="Confirm Password not matching password";
    } 
    

    if (count($error)==0) {
        

        $query="INSERT INTO seeker(name,age,username,password,email,phone,blood_group,gender,country) VALUES('$name','$age','$username','$password','$email','$phone','$blood_group','$gender','$country')";
        $result=mysqli_query($connect,$query);

        if ($result) {
          echo "<script>alert('Successfully Applied')</script>";
          header("Location: seekerlogin.php");
        }else{
            echo "<script>alert('Failed')</script>";

        }
    }
}
}
if (isset($error['apply'])) {
    $s=$error['apply'];
    $show="<h5 class='text-center alert alert-danger'> $s</h5>";
}
else{

    $show="";
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
    <title>Apply Now!!!</title>
</head>


<?php

include("header.php")

?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
</div>
<div class="col-md-6 my-3 jumbotron">
<h5 class="text-center">Apply Now!!! </h5>

<div>
    <?php echo $show; ?>
</div>
<form method="post"  name="myform"onsubmit="return validateform()">
    <div class="form-group">
    <label>Name </label>
            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Enter Name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">

</div>
<div class="form-group">
    <label>Age </label>
            <input type="number" name="age" class="form-control" autocomplete="off" placeholder="Enter age" value="<?php if(isset($_POST['age'])) echo $_POST['age'];?>">

</div>

<div class="form-group">
    <label>Username </label>
            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];?>">

</div>
<div class="form-group">
    <label>Email </label>
            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address"value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">

</div>

<div class="from-group">
    <label>Select Gender </label>
           <Select name="gender" class="form-control">
               <option value=""> Select Gender </option>
               <option value="Male">Male </option>
               <option value="Female">Female </option>
               <option value="Others">Others </option>
            </Select>
</div>
<div class="from-group">

    <label>Select Blood Group </label>
           <Select name="blood" class="form-control">
               <option value=""> Select Blood Group </option>
               <option value="A-">A- </option>
               <option value="A+">A+ </option>
               <option value="B-">B- </option>
               <option value="B+">B+ </option>
               <option value="AB-">AB- </option>
               <option value="AB+">AB+ </option>
               <option value="O-">O- </option>
               <option value="O+">O+ </option>
</Select>

</div>

<div class="form-group">
    <label>Phone Number </label>
            <input type="number" name="phone" class="form-control" autocomplete="off" 
              placeholder="Enter Phone Number" value="
              <?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">

</div>
<div class="from-group">

    <label>Select Country </label>
           <Select name="country" class="form-control">
               <option value=""> Select Country </option>
               
               <option value="India">India </option>
               
</Select>

</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" >


</div>
<div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password" >


</div>
<input type="submit" name="apply"  value="Apply Now" class="btn btn-danger" >
<p>I already have an account <a href="seekerlogin.php">Click here</a> </p>

</form>
</div>
<div class="col-md-3">
</div>



</div>

</div>

</div>
<script>  
function validateform(){  
var name=document.myform.email.value;  
var password=document.myform.pass.value;  
  
 
}else if(password.length<8){  
  alert("Password must be at least 8 characters long.");  
  return false;  
  }  
}  
</script> 
    
</body>
</html>