<?php
   include_once('Utilerias/database_utilerias.php');//include_once solo es para que se incluya una vez en todo el programa
   $result = consultaRole();
   if ($result === false) die("failed");
        
        print "<div class='container'> <table class='table table-bordered table-hover' align='center'>
        <div class='form-group'>
         <div class='col-md-8'>
        <tr><td>IdRole</td>
        </div>
        </div> </div>
        <td>Nombre del role</td>
        <td>Estado</td>
        <td>Fecha de creacion del role</td></tr> ";
   while (!$result->EOF) {
       $id=$result->fields['IdRole'];
       $nom=$result->fields['NomRole'];
       $edo=$result->fields['Estado'];
       $Fec=$result->fields['FechaCR'];
           print"<tr><td><a href='#' class='selecciona' data-id='$id' data-nom='$nom' data-edo='$edo' data-Fec='$Fec'>Click</a></td><td>$nom</td><td>$edo</td><td>$Fec</td></tr>"; 
     
        $result->MoveNext();
      
   }
    print"</table>";

 ?>