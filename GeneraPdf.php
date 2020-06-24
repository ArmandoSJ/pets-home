<?php
     include_once("./Utilerias/database_utilerias.php");
     $idm = isset($_REQUEST['idm'])?$_REQUEST['idm']:1;
     $idu = isset($_REQUEST['idu'])?$_REQUEST['idu']:1;
     $res=agregarAdop($idm,$idu);
     include_once("Menu.php");

   print "<a href='Reporte.php?idm=$idm &idu=$idu' class='btn btn-dark'>Adoptar</a>";
?>