<?php
   include_once("utilerias/database_utilerias.php");
   $idClase = isset($_REQUEST['idC'])?$_REQUEST['idC']:0;
   $NomClase= $_REQUEST['nomC'];
   $Estado= $_REQUEST['edo'];
   $bot= $_REQUEST['boton'];
   $res=0;
   if($bot == "Agregar")
   {
      $res= agregarClase($NomClase, $Estado);
   }
   if($bot == "Actualizar")
   {
      $res= actualizaClase($idClase,$NomClase,$Estado);
   }
 
   print $res;
?>