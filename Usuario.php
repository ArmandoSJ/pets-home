<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
  <?php
  if(!isset($_SESSION))  session_start(); //regresa un verdadero isset es para ver si la variable existe             
    if(!isset($_SESSION["conect"])) $_SESSION["conect"]="";
      if($_SESSION["conect"]!="969696969/969696969") //header("location:IndexLogin.php"); //proteger la seguridad al momeno de copiar la url
    {
       header("location:IndexLogin.php");
       
    } 
    else$bandera= true;
    ?>
    
   <div class="container">
     <?php include_once ("Menu.php"); ?>
      <h1>Catálogo de usuario</h1>
      <header>
          <div></div>
      </header>
       <form name="frm" id ="frm" >
           <fieldset>
               <div class="form-group">
                   <label for="idU" class="control-label col-md-4">
                   </label>
                   <div class="col-md-8">
                     <input type="hidden" name="idU" id="idU" class="form-control"/>
                   </div>
               </div>
               <div class="form-group">
                   <label for="nomU" class="control-label col-md-4">Nombre de usuario:</label>
                   <div class="col-md-8">
                       <input type="text" name="nomU" id="nomU" placeholder="Introducir el nombre de usuario" class="form-control" />
                   </div>
               </div>
               
                <div class="form-group has-warning">
                       <label for="corr" class="control-label col-md-4">Correo:</label>
                       <div class="col-md-8">
                           <input type="email" id="corr" name="corr" class="form-control" placeholder="Ingresa tu cuenta de correo valida" />
                       </div>
                   </div>
                   
                <div class="form-group has-warning">
                       <label for="cont" class="control-label col-md-4">Contraseña:</label>
                       <div class="col-md-8">
                           <input type="password" id="cont" name="cont" placeholder="Ingresa tu contraseña" class="form-control"/>
                       </div>
                </div>
                  
                 <div class="form-group has-warning">
                     <label for="domU" class="control-label col-md-4" >Domicilio:</label>
                     <div class="col-md-8">
                         <input type="text" id="domU" name="domU" class="form-control" placeholder="Ingresa tu domicilio" /> 
                     </div>             
                  </div> 
                 <div class="form-group has-warning">
                     <label for="telM" class="control-label col-md-4" >Telefono Movil:</label>
                     <div class="col-md-8">
                         <input type="text" id="telM" name="telM" class="form-control" placeholder="Ingresa tu telefono celular" /> 
                     </div>             
                 </div> 
                
                  <div class="form-group has-warning">
                     <label for="telF" class="control-label col-md-4" >Telefono Fijo:</label>
                     <div class="col-md-8">
                         <input type="text" id="telF" name="telF" class="form-control" placeholder="Ingresa tu telefono de casa" /> 
                     </div>             
                 </div> 
                   
               <div class="form-group has-warning">
                     <label for="curpU" class="control-label col-md-4" >Ingresa tu CURP:</label>
                     <div class="col-md-8">
                         <input type="text" id="curpU" name="curpU" class="form-control" placeholder="Ingresa tu CURP a 18 caracteres" /> 
                     </div>             
                 </div> 
                                  
               <div class="form-group">
                   <label for="edo" class="control-label col-md-4">Estado:</label>
                   <div class="col-md-8">
                       <select name="edo" id="edo" class="form-control">
                           <option value="1">Activo</option>
                           <option value="0">Inactivo</option>
                       </select>
                   </div>
               </div>
               
               <div class="form-group">
                     <label for="IdR" class="control-label col-md-4" >Roles:</label>
                     <div class="col-md-8">
                         <?php include_once("cboRole.php"); ?> 
                     </div>             
                 </div> 
                              
               <div class="form-group">
                   <div class="col-md-4 col-md-offset-4">
                <button type="button" class="btn btn-danger" name="boton" id="boton" value="Agregar">Agregar</button>
                <button type="button" class="btn btn-danger" name="boton" id="boton" value="Actualizar">Actualizar</button>
                <button type="button" class="btn btn-danger" name="boton" id="boton" value="Limpiar">Limpiar</button>
                   </div>
               </div>
           </fieldset>
       </form>
   </div>
      
 <div id="msj" align="center"></div>
<div id="table" align="center"></div>    
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
 

 
  <script>
        $("#table").load("TablaUsuario.php");
        $("#table").on("click",".selecciona",function()
        {
           $("#idU").val($(this).attr("data-id"));
           $("#nomU").val($(this).attr("data-nom")); 
           $("#corr").val($(this).attr("data-correo"));
           $("#cont").val($(this).attr("data-cont"));
           $("#domU").val($(this).attr("data-domic"));
           $("#telF").val($(this).attr("data-telef"));
           $("#telM").val($(this).attr("data-telem"));
           $("#curpU").val($(this).attr("data-curpUsu"));
           $("#IdR").val($(this).attr("data-idr"));
           $("#edo").val($(this).attr("data-edo"));
           
            
        });
        
        $("#boton[type=button]").click(function()
        {
           var bot = $(this).attr("value");
            if(bot=="Limpiar")
            {
                $("#idU").val("");
                $("#nomU").val("");
                $("#corr").val("");
                $("#cont").val("");
                $("#domU").val("");
                $("#telF").val("");
                $("#telM").val("");
                $("#curpU").val("");
                $("#IdR").val("1");
                $("#edo").val("1");
                $("#nomU").focus();
            }
            else
            {
                var
                parametros='idU='+$("#idU").val()+
                    '&nomU='+$("#nomU").val()+
                    '&corr='+$("#corr").val()+
                    '&cont='+$("#cont").val()+
                    '&domU='+$("#domU").val()+
                    '&telF='+$("#telF").val()+
                    '&telM='+$("#telM").val()+
                    '&curpU='+$("#curpU").val()+
                    '&IdR='+$("#IdR").val()+
                    '&edo='+$("#edo").val()+
                    '&boton='+bot;
          
                    $.ajax({
                    url:"actUsuario.php",
                    type:"get",
                    data:parametros,
                    success: function(respuesta)
                        {
                            if($.trim(respuesta)==1)
                                {
                                    $("#msj").html('<h3>Transacción Exitosa</h3>');
                                    setTimeout(function()
                                    {
                                     $("#msj").fadeOut(2000);
                                    },2000);
                                    $("#idU").val("");
                $("#nomU").val("");
                $("#corr").val("");
                $("#cont").val("");
                $("#domU").val("");
                $("#telF").val("");
                $("#telM").val("");
                $("#curpU").val("");
                $("#IdR").val("1");
                $("#edo").val("1");
                $("#nomU").focus(); $("#table").load("TablaUsuario.php");
                                }
                            else
                            {
                                   $("#msj").html('<h3>Transacción no exitosa</h3>');
                                    setTimeout(function()
                                    {
                                     $("#msj").fadeOut(2000);
                                    },2000);
                                
                            }
                            
                        }
                    });
            }
        });
           
    </script>
  
</body>
</html>