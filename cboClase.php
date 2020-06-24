<?php
include_once("./Utilerias/database_utilerias.php");
$rest= consultaClase();
print"<select name='idclase'id='idclase' class='form-control'>";
while(!$rest->EOF)
{
    $id=$rest->fields['IdClase'];
    $nom=$rest->fields['NomClase'];
print"<option value='$id'>$nom</option>";
$rest->MoveNext();    
}

print"</select>";
?>