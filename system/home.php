
<?php 
  require "controller/redireccion.php";
  require "layout/header.php"; 
?>
<body>
  <nav class="navbar">
    <div class="navbar-menu" id="">
      <a class="navbar-brand" href="#">Portal IEISM</a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ALMACEN</a>
        </li>
      </ul>
    </div>
    <div class="navbar-secion">
      <div class="name-secion">Hola;<br> <strong><?php echo $fetch_info['name'] ?></strong></div>
      <a class="btn" href="logout-user.php">Salir</a>
    </div> 
  </nav>
    
    
</body>
</html>