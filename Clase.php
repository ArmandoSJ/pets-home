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
      <h1 align="center">Catálogo de Clases</h1>
      <header>
          <div></div>
      </header>
       <form name="frm" id ="frm">
           <fieldset>
               
                <div class="form-group">
                   <label for="idC" class="control-label col-md-4">
                   </label>
                   <div class="col-md-8">
                     <input type="hidden" name="idC" id="idC" class="form-control"/>
                   </div>
               </div>
               
               <div class="form-group">
                   <label for="nomC" class="control-label col-md-4">Nombre de la clase:</label>
                   <div class="col-md-8">
                       <input type="text" name="nomC" id="nomC" placeholder="Introducir el nombre de la clase" class="form-control" />
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
        $("#table").load("TablaClase.php");
        $("#table").on("click",".selecciona",function()
        {
           $("#idC").val($(this).attr("data-id"));
           $("#nomC").val($(this).attr("data-nom")); 
           $("#edo").val($(this).attr("data-edo")); 
            
        });
        
        $("#boton[type=button]").click(function()
        {
           var bot = $(this).attr("value");
            if(bot=="Limpiar")
            {
                $("#idC").val("");
                $("#nomC").val("");
                $("#edo").val("1");
                $("#nomC").focus();
            }
            else
            {
                var
                parametros='idC='+$("#idC").val()+
                    '&nomC='+$("#nomC").val()+
                    '&edo='+$("#edo").val()+
                    '&boton='+bot;
                    $.ajax({
                    url:"actClase.php",
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
                                    $("#idC").val("");
                                    $("#nomC").val("");
                                    $("#edo").val("1");
                                    $("#nomC").focus();
                                    $("#table").load("TablaClase.php");
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
   