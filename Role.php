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
       header("location:IndexL.php");
       
    } 
    else$bandera= true;
    ?>
    
   <div class="container">
     <?php include_once ("Menu.php"); ?>
      <h1 align="center">Catálogo de Roles</h1>
      <header>
          <div></div>
      </header>
       <form name="frm" id ="frm">
           <fieldset>
               
                <div class="form-group">
                   <label for="idR" class="control-label col-md-4">
                   </label>
                   <div class="col-md-8">
                     <input type="hidden" name="idR" id="idR" class="form-control"/>
                   </div>
               </div>
               
               <div class="form-group">
                   <label for="nomR" class="control-label col-md-4">Nombre del Role:</label>
                   <div class="col-md-8">
                       <input type="text" name="nomR" id="nomR" placeholder="Introducir el nombre del role" class="form-control" />
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
                   <div class="col-md-4 col-md-offset-4">
                <button type="button" class="btn btn-dark" name="boton" id="boton" value="Agregar">Agregar</button>
                <button type="button" class="btn btn-dark" name="boton" id="boton" value="Actualizar">Actualizar</button>
                <button type="button" class="btn btn-dark" name="boton" id="boton" value="Limpiar">Limpiar</button>
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
        $("#table").load("TablaRole.php");
        $("#table").on("click",".selecciona",function()
        {
           $("#idR").val($(this).attr("data-id"));
           $("#nomR").val($(this).attr("data-nom")); 
           $("#edo").val($(this).attr("data-edo")); 
            
        });
        
        $("#boton[type=button]").click(function()
        {
           var bot = $(this).attr("value");
            if(bot=="Limpiar")
            {
                $("#idR").val("");
                $("#nomR").val("");
                $("#edo").val("1");
                $("#nomR").focus();
            }
            else
            {
                var
                parametros='idR='+$("#idR").val()+
                    '&nomR='+$("#nomR").val()+
                    '&edo='+$("#edo").val()+
                    '&boton='+bot;
                    $.ajax({
                    url:"actRole.php",
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
                                    $("#idR").val("");
                                    $("#nomR").val("");
                                    $("#edo").val("1");
                                    $("#nomR").focus();
                                    $("#table").load("TablaRole.php");
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