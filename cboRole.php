<?php
include_once("./Utilerias/database_utilerias.php");
$rest= consultaRole();
print"<select name='IdR'id='IdR' class='form-control'>";
while(!$rest->EOF)
{
    $id=$rest->fields['IdRole'];
    $nom=$rest->fields['NomRole'];
print"<option value='$id'>$nom</option>";
$rest->MoveNext();    
}

print"</select>";
?>

