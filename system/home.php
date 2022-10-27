
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
  <?php require "layout/navbar.php"; ?>
  <div class="grid-container storeproduct">
    <?php require "layout/aside.php"; ?>
    <div class="container-product">
      <h1>INICIO</h1>
      <!-- <h2>Registro de Productos</h2> -->
    </div>
  </div>
    
</body>
</html>