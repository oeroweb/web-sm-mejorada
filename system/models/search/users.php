<?php

  require_once '../../controller/connection.php';
  $sql = "SELECT * FROM usertable";

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