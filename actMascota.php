<?php
   include_once("./Utilerias/database_utilerias.php");
   $idMas = isset($_REQUEST['idM'])?$_REQUEST['idM']:0;
   $NomMas= $_REQUEST['nomM'];
   $Sexom= $_REQUEST['sx'];
   $Tama= $_REQUEST['tam'];
   $Edad= $_REQUEST['eda'];
   $Salud= $_REQUEST['sal'];
   $Descripc= $_REQUEST['des'];
   $fotom= $_REQUEST['fot'];
   $Estado= $_REQUEST['edo'];
   $idc= $_REQUEST['IdC'];
   $bot= $_REQUEST['boton'];
   $res=0;
   if($bot == "Agregar")
   {
      $res= agregarMascota($NomMas,$Sexom,$Tama,$Edad,$Salud,$Descripc,$fotom,$Estado,$idc);
   }
   if($bot == "Actualizar")
   {
      $res= actualizaMascota($idMas,$NomMas,$Sexom,$Tama,$Edad,$Salud,$Descripc,$fotom,$Estado,$idc);
   }
 
   print $res;
?>