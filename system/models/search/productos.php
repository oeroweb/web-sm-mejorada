<?php

  require_once '../../controller/connection.php';
  $sql = "SELECT *, p.id as 'idProducto', p.nombre as 'nombreProducto', al.nombre as 'NombreAlmacen', md.nombre as 'nombreMedida' FROM productos p 
  inner join almacentable al on p.almacen_id = al.id
  inner join medidatable md on p.medidatable_id = md.id
  WHERE p.estado = 1";

  $result = mysqli_query($con, $sql);

  if(!$result){
    die("Error! Fallo de Comunicación");
  }else{
    while($data = mysqli_fetch_assoc($result)){
      $arreglo['data'][]= $data;
      
    }
    echo json_encode($arreglo);
  }
mysqli_free_result($result);
mysqli_close($con);

?>