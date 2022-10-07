<?php require_once "controller/controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    
    nav a.navbar-brand{
      color: #fff;
      font-size: 30px!important;
      font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    
    </style>
</head>
<body>
  <nav class="navbar fixed-top navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Portal IEISM</a>
    <div class="d-flex align-items-center">
      <p class="px-2 my-0 text-white fw-light">Hola;<br> <span class="fw-bold"><?php echo $fetch_info['name'] ?></span></p>
      <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </div>
  </nav>
    
    
</body>
</html>