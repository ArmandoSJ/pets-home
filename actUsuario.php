<?php
   include_once("./Utilerias/database_utilerias.php");
   $idUsu = isset($_REQUEST['idU'])?$_REQUEST['idU']:0;
   $NomUsu= $_REQUEST['nomU'];
   $Corre= $_REQUEST['corr'];
   $Contr= $_REQUEST['cont'];
   $Domi= $_REQUEST['domU'];
   $TF= $_REQUEST['telM'];
   $TM= $_REQUEST['telF'];
   $curpUsu= $_REQUEST['curpU'];
   $Estado= $_REQUEST['edo'];
   $idRole= $_REQUEST['IdR'];
   $bot= $_REQUEST['boton'];
   $res=0;
   if($bot == "Agregar")
   {
      $res= agregarUsuario($NomUsu,$Corre,$Contr,$Domi,$TF,$TM,$curpUsu,$Estado,$idRole);
   }
   if($bot == "Actualizar")
   {
      $res= actualizaUsuario($idUsu,$NomUsu,$Corre,$Contr,$Domi,$TF,$TM,$curpUsu,$Estado,$idRole);
   }
 
   print $res;
?>