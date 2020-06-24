<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Estilos.css">
</head>
<body>
       
        <?php   
    if(!isset($_SESSION))  session_start(); //regresa un verdadero isset es para ver si la variable existe             
    if(!isset($_SESSION["conect"])) $_SESSION["conect"]="";
    if($_SESSION["conect"]=="969696969/969696969") //header("location:IndexLogin.php"); //proteger la seguridad al momeno de copiar la url
    {
       $bandera= true;
       $corr=$_SESSION["Correo"];  
    }  
    if($_SESSION["conect"]=="4599695/65479"){
        $bandera= true;
       $corr=$_SESSION["Correo"];
    }
     ?>      
     
      <div class="">
          <header>
          <nav class="navbar navbar-light navbar-expand-lg  " style="background-color:#e3f2fd;">
  <a class="navbar-brand" href="http://localhost/ProyectoFinalVa/Index.php">La Casa De La Mascota</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <?php 
         if($_SESSION["conect"]=="969696969/969696969")
         {
      print "<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Cátalogos
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='Role.php'>Roles</a>
          <a class='dropdown-item' href='Usuario.php'>Usuarios</a>
          <a class='dropdown-item' href='Mascota.php'>Mascotas</a>
          <a class='dropdown-item' href='Clase.php'>Clases</a>
            
        </div>
      </li>";
        }
        ?>
        
       <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <?php
        $bandera=isset($bandera)?$bandera:false;
        if($bandera)
        {
            
          print "<label class='control-label mr-sm-2'>Bienvenido: $corr</label>";
         print "<a class='nav-link my-2 my-sm-0' href='http://localhost/ProyectoFinalVa/Destruir.php'>Cerrar Sesion</a>";  
        }
         else
         {
        print "<a class='nav-link my-2 my-sm-0' href='http://localhost/ProyectoFinalVa/IndexL.php'>Inicar Sesion</a>";
             
         }
          ?>
          
  
  </div>
</nav>
          </header>
      </div>
      
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>   
    </body>
</html>