<?php
   include_once("utilerias/database_utilerias.php");
   $idRole = isset($_REQUEST['idR'])?$_REQUEST['idR']:0;
   $NomRole= $_REQUEST['nomR'];
   $Estado= $_REQUEST['edo'];
   $bot= $_REQUEST['boton'];
   $res=0;
   if($bot == "Agregar")
   {
      $res= agregarRole($NomRole, $Estado);

   }
   if($bot == "Actualizar")
   {
      $res= actualizaRole($idRole,$NomRole,$Estado);
   }
 
   print $res;
?>