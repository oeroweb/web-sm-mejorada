
<?php 
  require "layout/header.php"; 
  require_once "controller/controllerUserData.php";

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
<body>
  <nav class="navbar">
    <div class="navbar-menu" id="">
      <a class="navbar-brand" href="#">Portal IEISM</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ALMACEN</a>
        </li>
      </ul>
    </div>
    <div class="navbar-secion">
      <div class="name-secion">Hola,<strong> <?php echo $fetch_info['name'] ?></strong></div>
      <a class="btn" href="logout-user.php">Salir</a>
    </div> 
  </nav>
    
    
</body>
</html>