<?php 
  require "layout/header.php"; 
  require_once "controller/controllerUserData.php";
  require_once "controller/redireccion.php";
  require_once "models/helpers.php";
?>
<body>
  <?php require "layout/navbar.php"; ?>
  <div class="grid-container storeproduct">
    <?php require "layout/aside.php"; ?>
    <div class="container-product">
      <div class="box-breadcrumbs">
        <a class="btn-link" href="javascript:history.back()" title="Atras">
          <span class="material-symbols-outlined">
            arrow_back
          </span>
          Atras
        </a>
        | Productos /
        <a href="#" class="btn-link"> Registro Productos  
          <span class="material-symbols-outlined">
            subdirectory_arrow_left
          </span>
        </a>        
      </div>

      <div class="box-title">
        <h2>Registrar de Ingreso o Salida</h2>        
      </div>
      <div class="box-form">
        <p>Estamos trabajando para brindarte una mejor experiencia</p>
        <!-- <form action="">
          <div class="box-input">
            <label for="">Almacen</label>
            <select class="" name="almacen" id="almacen" required>
              <option value="">Selecciona un Almacen</option>
              <?php 
                $datos = selectalldatos($con, 'almacentable');
                if(!empty($datos) && mysqli_num_rows($datos) >= 1):
                  while($dato = mysqli_fetch_assoc($datos)):
              ?>											
                <option value="<?=$dato['id']?>" >
                  <?=$dato['nombre']?>
                </option>										
              <?php endwhile; endif; ?>																
            </select>
          </div>
          <div class="box-input">
            <label for="">Código</label>
            <input type="text" name="codigo" placeholder="Ingresa un código">
          </div>
          <div class="box-input">
            <label for="">Nombre de Producto</label>
            <input type="text" name="nombre" placeholder="Ingresa un nombre" required>
          </div>          
          <div class="box-input" >
            <label for="">Marca</label>
            <input type="text" name="marca" placeholder="ingresar una marca">
          </div>
          <div class="box-input" >
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" min="0" placeholder="ingresar una cantidad">
          </div>          
          <div class="box-input" >
            <label for="">Fecha de Ingreso</label>
            <input type="date" placeholder="ingresar una marca" value="<?=date('Y-m-d')?>" required>
          </div>
          <div class="box-input">
            <label for="">Unidad de Medida</label>
            <select name="medida" id="" required>
              <option value="">Selecciona una medida</option>
              <?php 
                $datos = selectalldatos($con, 'medidatable');
                if(!empty($datos) && mysqli_num_rows($datos) >= 1):
                  while($dato = mysqli_fetch_assoc($datos)):
              ?>											
                <option value="<?=$dato['id']?>" >
                  <?=$dato['nombre']?>
                </option>										
              <?php endwhile; endif; ?>			
            </select>
          </div>
          <div class="box-buttons" >            
            <button type="submit">
              <span class="material-symbols-outlined">
                save
              </span>
              Registrar
            </button>          
            <button type="reset" >
              <span class="material-symbols-outlined">
                delete_sweep
              </span>  
              Cancelar
            </button>
          </div>
        </form> -->
      </div>
    </div>
  </div>
  <?php borrarErrores(); ?>	 
</body>
</html>