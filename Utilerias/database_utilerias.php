
<?php

//Archivo para el acceso a base de datos del proyecto
//JVTT                     14/02/2018
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'webadopcion');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
include("./adodb5/adodb.inc.php");

$Cn = NewADOConnection('mysqli');
$Cn->Connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function Ejecuta($sentencia)
{
    global $Cn;
    if ($Cn->Execute($sentencia) == false)
    return 'error al insertar'.$Cn->ErrorMsg().'<BR>';
    else
        return "1";    
}
//validacion del usuario al momento de ingresar 
function valduser($correo)
{
    global $Cn;
    $sql ="select IdUsuario,Correo,Contrasena,IdRole from usuario where Correo ='{$correo}'";
    return $Cn->Execute($sql);
}

// funcion de agregado desde la parte del index (login)
function agregaruser($nom,$corr,$cont,$dom,$telf,$telm,$curp)
{
    $pwdEnc =password_hash($cont,PASSWORD_DEFAULT);
    $sql ="insert into usuario(IdRole,NomUsuario,Correo,Contrasena,Domicilio,TelefonoFijo,TelefonoMovil,CURP,Estado)value(2,'{$nom}','{$corr}','{$pwdEnc}','{$dom}','{$telf}','{$telm}','{$curp}',1)";
    return ejecuta($sql);
    
}










//------------- Catálogo de Usuario-----------------------
function consultaUsu($id){
	global $Cn;
	$sql = "SELECT NomUsuario,Correo,Domicilio,TelefonoFijo,TelefonoMovil,CURP From usuario where IdUsuario={$id} order By NomUsuario";
	return $Cn->Execute($sql);
}


function consultaUsuario()
{
	global $Cn;
	$sql = "SELECT IdUsuario,NomUsuario,Correo,Contrasena,Domicilio,TelefonoFijo,TelefonoMovil,CURP, Estado, FechaCU,IdRole From usuario order By NomUsuario";
	return $Cn->Execute($sql);
}

function agregarUsuario($NomUsu,$Corre,$Contr,$Domi,$TF,$TM,$curpUsu,$Estado,$idRole)
{
 
    $sql = "Insert into usuario(NomUsuario,Correo,Contrasena,Domicilio,TelefonoFijo,TelefonoMovil,CURP,Estado,IdRole) values('{$NomUsu}','{$Corre}','{$Contr}','{$Domi}',{$TF},{$TM},'{$curpUsu}', {$Estado},{$idRole})";
   return Ejecuta ($sql);    
}



function actualizaUsuario($idUsu,$NomUsu,$Corre,$Contr,$Domi,$TF,$TM,$curpUsu,$Estado,$idRole)
{

    $sql = "Update usuario set NomUsuario='{$NomUsu}',Correo='{$Corre}', Contrasena='{$Contr}',Domicilio='{$Domi}',TelefonoFijo={$TF},TelefonoMovil={$TM},CURP='{$curpUsu}',Estado=$Estado, IdRole={$idRole} where IdUsuario={$idUsu}";
    return Ejecuta ($sql);
}
function borraUsuario($idUsu)
{
    global $Cn;
    $sql = "Delete from usuario where idUsuario={$idUsu}";
    return Ejecuta ($sql);
}


//------------- Catálogo de Mascota-----------------------
function consultaMascota2($idc)
{
    global $Cn;
	 $sql = "SELECT IdMascota,NomMascota,Sexo,Tamano,Edad,Salud,Descripcion,Foto,Estado From mascota where IdClase={$idc}";
	return $Cn->Execute($sql);
}
function consultaMascota3($idm)
{
    global $Cn;
	 $sql = "SELECT IdClase,NomMascota,Sexo,Tamano,Edad,Salud,Descripcion,Foto,Estado From mascota where IdMascota={$idm}" ;
	return $Cn->Execute($sql);
}


function consultaMascota()
{
	global $Cn;
	$sql = "SELECT IdMascota,NomMascota,Sexo,Tamano,Edad,Salud,Descripcion,Foto,Estado,FechaCM,IdClase From mascota Order By NomMascota";
	return $Cn->Execute($sql);
}

function agregarMascota($NomMas,$Sexom,$Tama,$Edad,$Salud,$Descripc,$fotom,$Estado,$idClase)
{
 
    $sql = "Insert into mascota(NomMascota,Sexo,Tamano,Edad,Salud,Descripcion,Foto,Estado,idClase) values('{$NomMas}','{$Sexom}','{$Tama}','{$Edad}','{$Salud}','{$Descripc}','{$fotom}', {$Estado},{$idClase})";
   return Ejecuta ($sql);    
}



function actualizaMascota($idMas,$NomMas,$Sexom,$Tama,$Edad,$Salud,$Descripc,$fotom,$Estado,$idClase)
{
    global $Cn;
    $sql = "Update mascota set NomMascota='{$NomMas}',Sexo='{$Sexom}',Tamano='{$Tama}',Edad='$Edad',Salud='{$Salud}',Descripcion='{$Descripc}',Foto='{$fotom}', Estado=$Estado,IdClase={$idClase} where IdMascota={$idMas}";
    return Ejecuta ($sql);
}


//------------- Catálogo de Role-----------------------
function consultaRole()
{
	global $Cn;
	$sql = "SELECT IdRole,NomRole,Estado,FechaCR From role where Estado=1 Order By NomRole";
	return $Cn->Execute($sql);
    print $sql;
}

function agregarRole($NomRole, $Estado)
{
    
    $sql = "Insert into Role(NomRole,Estado) values('{$NomRole}', {$Estado})";
    return Ejecuta ($sql);
}
function actualizaRole($idRole,$NomRole,$Estado)
{
    global $Cn;
    $sql = "Update role set NomRole='{$NomRole}', Estado=$Estado where idRole={$idRole}";
    return Ejecuta ($sql);
}
function borraRole($idRole)
{
    global $Cn;
    $sql = "Delete from Role where idRole={$idRole}";
    return Ejecuta ($sql);
}

//------------- Catálogo de Clase-----------------------
function consultaClase()
{
	global $Cn;
	$sql = "SELECT IdClase,NomClase,Estado,FechaCC From clase where Estado=1 Order By NomClase";
	return $Cn->Execute($sql);
    print $sql;
}

function agregarClase($NomClase, $Estado)
{
    
    $sql = "Insert into clase(NomClase,Estado) values('{$NomClase}', {$Estado})";
    return Ejecuta ($sql);
}
function actualizaClase($idClase,$NomClase,$Estado)
{
   
    $sql = "Update clase set NomClase='{$NomClase}', Estado=$Estado where idClase={$idClase}";
    return Ejecuta ($sql);
}
function borraClase($idClase)
{
    
    $sql = "Delete from clase where idClase={$idClase}";
    return Ejecuta ($sql);
}



function agregarAdop($idm, $idu)
{
    
    $sql = "Insert into Adopcion(Idusuario,IdMascota,Estado) values('{$idu}', {$idm},1)";
    return Ejecuta ($sql);
}

function consultaAdop($idp,$idu)
{
	global $Cn;
	$sql = "SELECT NomMascota,NomUsuario,Domicilio,TelefonoMovil,CURP
         From Adopcion A inner join Mascota B on(A.IdMascota=B.IdMascota)inner join Usuario C on(A.IdUsuario=C.IdUsuario)
         where A.IdUsuario={$idu} and B.IdMascota={$idp}";
	return $Cn->Execute($sql);
    print $sql;
}