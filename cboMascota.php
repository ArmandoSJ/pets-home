<?php
include_once("./Utilerias/database_utilerias.php");
$rest= consultaMascota();
print"<select name='idMascota'id='idMascota' class='form-control'>";
while(!$rest->EOF)
{
    $id=$rest->fields['idMascota'];
    $nom=$rest->fields['NomMascota'];
print"<option value='$id'>$nom</option>";
$rest->MoveNext();    
}

print"</select>";
?>