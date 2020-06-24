<!DOCTYPE html>
<html lang="es">
<head>
    
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    
</head>
<body>
    <header>
    <h2>Contenido</h2>
    </header>

      <div class="container-fluid"> 
           
       <div class="row">
           <div class="col-md-12 ">
              <br />
              
               <div id="Carrucel" class="carousel slide"  data-ride="carousel">
                  <ol class="carousel-indicators">
                   <li data-target="#Carrucel" data-slide-to="0" class="active"></li>
                   <li data-target="#Carrucel" data-slide-to="1" ></li>
                   <li data-target="#Carrucel" data-slide-to="2" ></li>
                   <li data-target="#Carrucel" data-slide-to="3" ></li>
                   </ol>
                   
                   <div class="carousel-inner" role="listbox">
                       <div class="carousel-item active">
                           <img src="./img/1.jpg"  class="img-fluid rounded-circle img-responsive" alt="Foto1" />
                       </div>
                       
                       <div class="carousel-item ">
                           <img src="./img/2.jpg"  class="img-fluid rounded-circle img-responsive" alt="Foto2" />
                           
                           <div class="carousel-caption">
                               <h2></h2>
                               <p></p>
                           </div>
                           
                       </div>
                       
                       <div class="carousel-item">
                           <img src="./img/3.jpg"  class="img-fluid rounded-circle img-responsive" alt="Foto3">
                       </div>
                           
                           <div class="carousel-item">
                           <img src="./img/4.jpg"  class="img-fluid rounded-circle img-responsive" alt="Foto3">
                           </div>
                   </div>
                   
                   <a href="#Carrucel" class="left carousel-control"  role="button" data-slide="prev">
                       <span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span>
                       <span class="sr-only">Previa</span>
                   </a>
                   
                   <a class="right carousel-control" href="#Carrucel" role="button" data-slide="next">
                       <span class="glyphicon glyphicon-chevron-right" arial-hidden="true"></span>
                       <span class="sr-only">Previa</span>
                   </a>
               </div>
           </div>
       </div>
                
   
   </div>
          
          
           
                <div class="form-group">
                         <label for="idclase" class="control-label col-md-4">Clase:</label>
                           <div class="col-md-5">
                               <?php
                               
        if($_SESSION["conect"]=="4599695/65479")
                     {
                      include_once("cboClase.php");
                     }
                               
                               
                               ?>
                           </div>
                            </div>
                            
          
    <div clase="conteiner" id="tabla" >
    <?php 
        if($_SESSION["conect"]=="4599695/65479")
         {
        include_once("Foto.php"); 
         }
        else{
            include_once("MascotasIndex.php"); 
        }
        if($_SESSION["conect"]=="969696969/969696969" )
         {
        include_once("Foto.php"); 
         }
        
        ?>   </div>
        
        
        <?php include_once("user-map.php"); ?>
        
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
     <script>
     $("#idclase").change(function(){
    var idc = $("select[name=idclase]").val();
         //alert(idc);
    $("#tabla").load("Foto.php?IdC="+idc);
     });
    </script>
        
</body>
</html>