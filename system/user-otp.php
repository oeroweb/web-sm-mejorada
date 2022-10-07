<?php require_once "controller/controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>
<?php require "layout/header.php"; ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Código de Verificación</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Ingresa tu codigo" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Validar Codigo">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>