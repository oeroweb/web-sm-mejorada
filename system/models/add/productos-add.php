<?php
  if(isset($_POST)){
    require_once '../../controller/connection.php';
    
    if(!isset($_SESSION)){
      session_start();
    }

    $almacen = isset($_POST['almacen']) ? $_POST['almacen'] : false;
    $medida = isset($_POST['medida']) ? $_POST['medida'] : false;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;
    $marca = isset($_POST['marca']) ? $_POST['marca'] : false;
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
    $usuario = $_SESSION['session_sm']['name'];

    $sql = "INSERT INTO productos (almacen_id, medidatable_id, nombre, codigo, marca, stock, fechacreacion) 
    VALUES($almacen, $medida, '$nombre', '$codigo','$marca', $cantidad, CURDATE());";
    $result = mysqli_query($con, $sql);   

    if(mysqli_affected_rows($con)>0){
      $_SESSION['completado'] = "<p>El regritro se completo de forma exitosa</p>";
    }else{
      $_SESSION['fallo'] = "<p>No se completo el regristro, por favor volver a intentar!</p>";
    }
    header("Location: ../../store-product.php");
  }else{
    header("Location: ../../store-product.php");
  }
?>