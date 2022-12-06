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
        <h2>Registrar de Producto</h2>        
      </div>
      <div class="box-form">
        <form action="">
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
            <input type="text" placeholder="Ingresa un código de producto">
          </div>
          <div class="box-input">
            <label for="">Nombre de Producto</label>
            <input type="text" placeholder="Ingresa un producto">
          </div>          
          <div class="box-input" >
            <label for="">Marca</label>
            <input type="text" placeholder="ingresar una marca">
          </div>
          
          <div class="box-input" >
            <label for="">Fecha de Ingreso</label>
            <input type="date" placeholder="ingresar una marca" value="<?=date('Y-m-d')?>">
          </div>
          <div class="box-input" >
            <label for="">Cantidad</label>
            <input type="number" min="0" placeholder="ingresar una marca">
          </div>
          <div class="box-input">
            <label for="">Unidad de Medida</label>
            <select name="almacen" id="">
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
        </form>
      </div>
    </div>
  </div>
  <?php borrarErrores(); ?>	 
</body>
</html>