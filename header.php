<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>

    <link rele="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <h5 class="text-white">Blood Bank Management System</h5>
            <ul class="navbar-nav mr-auto">
                <?php
                   if(isset($_SESSION['admin'])){

                        $user = $_SESSION['admin'];
                        echo '
                            <li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>

                      ';
                   }
                   else if(isset($_SESSION['donar']))
                   {
                        $user = $_SESSION['donar'];
                        echo '
                            <li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
                        ';
                   }
                   else if(isset($_SESSION['seeker']))
                   {
                        $user = $_SESSION['seeker'];
                        echo '
                            <li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                            <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
                        ';
                   }
                   else{
                     echo '
                            <li class="nav-item"><a href="index.php" class="nav-link text-white">    Home </a></li>
                            <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white"> Admin </a></li>
                            <li class="nav-item"><a href="donarlogin.php" class="nav-link text-white"> Blood Donar </a></li>
                            <li class="nav-item"><a href="seekerlogin.php" class="nav-link text-white"> Blood Seeker </a></li>
                     ';
                   }

                ?>
            </ul>
    </nav>    

</body>
</html>