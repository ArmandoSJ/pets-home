<?php
   include_once("./Utilerias/database_utilerias.php");
   $result = consultaMascota();
   if ($result === false) die("failed");
        
        print "<div class='container'> <table class='table table-bordered table-hover' align='center'>
        <div class='form-group'>
         <div class='col-md-8'>
        <tr><td>IdMascota</td>
        </div>
        </div> </div>
        <td>Nombre de la mascota</td>
        <td>Sexo</td>
        <td>Tamaño</td>
        <td>Edad</td>
        <td>Salud</td>
        <td>Descripción</td>
        <td>Foto</td>
        <td>IdClase</td>
        <td>Estado</td>
        <td>Fecha de alta de la mascota</td>
        </tr> ";
   while (!$result->EOF) {
       $id=$result->fields['IdMascota'];
       $nom=$result->fields['NomMascota'];
       $sexo=$result->fields['Sexo'];
       $tama=$result->fields['Tamano'];
       $Edad=$result->fields['Edad'];
       $Salud=$result->fields['Salud'];
       $Descr=$result->fields['Descripcion'];
       $fot=$result->fields['Foto'];
       $idClase=$result->fields['IdClase'];
       $edo=$result->fields['Estado'];
       $Fec=$result->fields['FechaCM'];
           print"<tr><td><a href='#' class='selecciona' data-id='$id'data-nom='$nom'data-sexo='$sexo'data-tama='$tama'data-Edad='$Edad'data-Salud='$Salud'data-Descr='$Descr'data-fot='$fot' data-idClase='$idClase'data-edo='$edo'>Click</a></td><td>$nom</td><td>$sexo</td><td>$tama</td><td>$Edad</td><td>$Salud</td><td>$Descr</td><td>$fot</td><td>$idClase</td><td>$edo</td><td>$Fec</td></tr>"; 
     
        $result->MoveNext();
      
   }
    print"</table>";

 ?>