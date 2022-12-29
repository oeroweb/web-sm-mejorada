<?php 
  require "layout/header.php"; 
  require_once "controller/controllerUserData.php";
  require_once "controller/redireccion.php";
  require_once "models/helpers.php";
  
  $usuarioPerfil = $_SESSION['session_sm']['perfil']; 
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
        <a href="#" class="btn-link"> Lista de Usuarios  
          <span class="material-symbols-outlined">
            subdirectory_arrow_left
          </span>
        </a>        
      </div>
      <div class="box-title">
        <h2>Listado de Usuarios</h2>
      </div>
      <div id="info"></div>

      <?php if(isset($_SESSION['completado'])): ?>
        <div class="alerta-exito">
          <?=$_SESSION['completado']?>  
        </div>
      <?php elseif(isset($_SESSION['fallo'])): ?>
        <div class="alerta-error">
          <?=$_SESSION['fallo']?>
        </div>
      <?php endif; ?> 

      <div class="box-tabla">
        <table id="dt_usuarios" class="hover w100">
          <thead>
            <tr>						
              <th class="al-ct w10">id</th>
              <th class="w30">Usuario</th>							
              <th class="w30">Correo</th>
              <th class="w20">Perfil</th>
              <?php if($usuarioPerfil <= '2'): ?>
                <th class="al-ct w10">Opciones</th>
              <?php endif; ?>
            </tr>	
          </thead>
        </table>
      </div>

    </div>
  </div>
  <?php borrarErrores(); ?>
  <?php include 'layout/footer.php'; ?>

  <script>
    $(document).ready(function(){
      listar();     
    });

    var listar = function(){
      var table = $("#dt_usuarios").DataTable({
        "dom": 'Bfrtip',
        "buttons": [
          'excel', 'pdf'
        ],
        "scrollX": true,
        "destroy":true,
        "ajax":{
          'method':'POST',
          'url':'models/search/users.php'
        },
        "columns":[
          {"data":"id"},
          {"data":"name"},					
          {"data":"email"},
          {"data":"perfil",
            render: function(data){
              if( data == 1)
              {data = "<span>Super Admin</span>"}
              else if (data == 2)
              {data = "<span>Usuario </span>"}
              return data;
            }
          }
          <?php if($usuarioPerfil <= '2'): ?>
          ,
          {"defaultContent": "<a class='editar btn-clear' title='Editar'><span class='material-symbols-outlined'>edit</span></a><?php if($usuarioPerfil <= '1'): ?><a class='eliminar btn-clear' title='Borrar'><span class='material-symbols-outlined'>delete</span></a><?php endif; ?>"}	
				  <?php endif; ?>	
        ],
        "language": idioma_espanol,
        "pageLength":50
      });
      // obtener_data_envio("dt_listaUsuarios tbody", table);		
    }
  
    var idioma_espanol = {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }	
    }
  </script>
</body>
</html>
