<?php
include_once("./Utilerias/database_utilerias.php");
$rest= consultaUsuario();
print"<select name='idUsuario'id='idUsuario' class='form-control'>";
while(!$rest->EOF)
{
    $id=$rest->fields['idUsuario'];
    $nom=$rest->fields['NomUsuario'];
print"<option value='$id'>$nom</option>";
$rest->MoveNext();    
}

print"</select>";
?>