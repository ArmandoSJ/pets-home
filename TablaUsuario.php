<?php
   include_once("./Utilerias/database_utilerias.php");
      
      $result = consultaUsuario();
   if ($result === false) die("failed");
        
        print "<div class='container'> <table class='table table-bordered table-hover' align='center'>
        <div class='form-group'>
         <div class='col-md-8'>
        <tr><td>IdUsuario</td>
        </div>
        </div> </div>
        <td>Nombre del usuario</td>
        <td>Correo</td>
        <td>Contraseña</td>
        <td>Domicilio</td>
        <td>Telefono Fijo</td>
        <td>Telefono Movil</td>
        <td>CURP</td>
        <td>IdRole</td>
        <td>Estado</td>
        <td>Fecha creacion del usuario</td>
        </tr> ";
   while (!$result->EOF) {
       $id=$result->fields['IdUsuario'];
       $nom=$result->fields['NomUsuario'];
       $correo=$result->fields['Correo'];
       $cont=$result->fields['Contrasena'];
       $domic=$result->fields['Domicilio'];
       $telem=$result->fields['TelefonoMovil'];
       $telef=$result->fields['TelefonoFijo'];
       $curpUsu=$result->fields['CURP'];
       $idr=$result->fields['IdRole'];
       $edo=$result->fields['Estado'];
       $Fec=$result->fields['FechaCU'];
           print"<tr><td>
           <a href='#' class='selecciona' data-id='$id' data-nom='$nom' data-correo='$correo' data-cont='$cont'data-domic='$domic' data-telef='$telef'data-telem='$telem' data-curpUsu='$curpUsu' data-idr='$idr' data-edo='$edo'>click</a></td>
           <td>$nom</td>
           <td>$correo</td>
           <td>$cont</td>
           <td>$domic</td>
           <td>$telef</td>
           <td>$telem</td>
           <td>$curpUsu</td>
           <td>$idr</td>
           <td>$edo</td>
           <td>$Fec</td>
           </tr>"; 
     
        $result->MoveNext();
      
   }
    print"</table>";

 ?>