<?php require_once "controller/controllerUserData.php"; ?>
<?php require "layout/header.php"; ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Restaurar Contraseña!</h2>
                    <p class="text-center">Escribe tu correo para cambiar de contraseña</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Ingresa tu correo" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                    <div class="link login-link "><a href="index.php">Regresar</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>