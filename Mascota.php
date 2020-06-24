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
      <h1>Catálogo de mascotas</h1>
      <header>
          <div></div>
      </header>
       <form name="frm" id ="frm">
           <fieldset>
               <div class="form-group">
                   <label for="idM" class="control-label col-md-4">
                   </label>
                   <div class="col-md-8">
                     <input type="hidden" name="idM" id="idM" class="form-control"/>
                   </div>
               </div>
               <div class="form-group">
                   <label for="nomM" class="control-label col-md-4">Nombre de la mascota:</label>
                   <div class="col-md-8">
                       <input type="text" name="nomM" id="nomM" placeholder="Introducir el nombre de la mascota" class="form-control" />
                   </div>
               </div>
               
               <div class="form-group">
                   <label for="sx" class="control-label col-md-4">Sexo:</label>
                   <div class="col-md-8">
                       <select name="sx" id="sx" class="form-control">
                           <option value="Macho">Macho</option>
                           <option value="Hembra">Hembra</option>
                       </select>
                   </div>
               </div>
               
                <div class="form-group">
                   <label for="tam" class="control-label col-md-4">Tamaño:</label>
                   <div class="col-md-8">
                       <select name="tam" id="tam" class="form-control">
                           <option value="Pequeño">Pequeño</option>
                           <option value="Mediano">Mediano</option>
                           <option value="Grande">Grande</option>
                       </select>
                   </div>
               </div>
               
                 <div class="form-group has-warning">
                     <label for="eda" class="control-label col-md-4" >Edad:</label>
                     <div class="col-md-8">
                         <input type="text" id="eda" name="eda" class="form-control" placeholder="Ingresa la edad de la mascota" /> 
                     </div>             
                  </div> 
                  
                   <div class="form-group">
                   <label for="sal" class="control-label col-md-4">Salud:</label>
                   <div class="col-md-8">
                       <select name="sal" id="sal" class="form-control">
                           <option value="Mala">Mala</option>
                           <option value="Regular">Regular</option>
                           <option value="Buena">Buena</option>
                       </select>
                   </div>
               </div>
                 
                  <div class="form-group has-warning">
                     <label for="des" class="control-label col-md-4" >Descripción:</label>
                     <div class="col-md-8">
                         <input type="text" id="des" name="des" class="form-control" placeholder="Escribe una reseña de la mascota" /> 
                     </div>             
                 </div> 
                   
                 <div class="form-group">
                    <label for="fot" class="control-label col-md-4">Foto:</label>
                    <div class="col-md-8">
                       <input type="text" name="fot" id="fot"  class="form-control">
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
                     <label for="IdC" class="control-label col-md-4" >Clases:</label>
                     <div class="col-md-8">
                         <?php include_once("cboClase.php"); ?> 
                     </div>             
                 </div> 
                              
               <div class="form-group">
                   <div class="col-md-4 col-md-offset-4">
                <button type="button"  class="btn btn-danger" name="boton" id="boton" value="Agregar">Agregar</button>
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
        $("#table").load("TablaMascota.php");
        $("#table").on("click",".selecciona",function()
        {
           $("#idM").val($(this).attr("data-id"));
           $("#nomM").val($(this).attr("data-nom")); 
           $("#sx").val($(this).attr("data-sexo"));
           $("#tam").val($(this).attr("data-tama"));
           $("#eda").val($(this).attr("data-Edad"));
           $("#sal").val($(this).attr("data-Salud"));
           $("#des").val($(this).attr("data-Descr"));    
           $("#fot").val($(this).attr("data-fot"));
           $("#edo").val($(this).attr("data-edo"));
           $("#IdC").val($(this).attr("data-idClase"));
             
            
        });
        
        $("#boton[type=button]").click(function()
        {
           var bot = $(this).attr("value");
            if(bot=="Limpiar")
            {
                $("#idM").val("");
                $("#nomM").val("");
                $("#sx").val("");
                $("#tam").val("");
                $("#eda").val("");
                $("#sal").val("");
                $("#des").val("");
                $("#fot").val("");
                $("#edo").val("1");
                $("#IdC").val("1");
                $("#nomM").focus();
            }
            else
            {
                var
                parametros='idM='+$("#idM").val()+
                    '&nomM='+$("#nomM").val()+
                    '&sx='+$("#sx").val()+
                    '&tam='+$("#tam").val()+
                    '&eda='+$("#eda").val()+
                    '&sal='+$("#sal").val()+
                    '&des='+$("#des").val()+
                    '&fot='+$("#fot").val()+
                    '&edo='+$("#edo").val()+
                    '&IdC='+$("#IdC").val()+
                    '&boton='+bot;
               
                    $.ajax({
                    url:"actMascota.php",
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
                $("#idM").val("");
                $("#nomM").val("");
                $("#sx").val("");
                $("#tam").val("");
                $("#eda").val("");
                $("#sal").val("");
                $("#des").val("");
                $("#fot").val("");
                $("#edo").val("1");
                $("#IdC").val("1");
                $("#nomM").focus(); $("#table").load("TablaMascota.php");
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