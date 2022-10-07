<?php require_once "controller/controllerUserData.php"; ?>
<?php require "layout/header.php"; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="index.php" method="POST" autocomplete="">
                    <h2 class="text-center">PORTAL DE GESTIÓN</h2>
                    <p class="text-center">Ingresa tu correo y contraseña</p>
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
                        <input class="form-control" type="email" name="email" placeholder="Ingresa tu correo" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="link forget-pass text-center"><a href="forgot-password.php">¿Olvide mi contraseña?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Ingresar">
                    </div>
                    <div class="link login-link text-center">Registrarte <a href="signup-user.php">aquí</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>