<?php
    include_once("./Utilerias/database_utilerias.php");
    $idcc = isset($_REQUEST['IdC'])?$_REQUEST['IdC']:1;
    $i=0;
    $inf=consultaMascota2($idcc);
     
    while($i<=2){
        print" <div class='container-fluid'><div class='row'>";
        while (!$inf->EOF) {
       $nom=$inf->fields['NomPregunta'];
       $sexo=$inf->fields['NomProyecto'];
      
        print "<div class='form-group'>
                   <label for='nomp$i' class='control-label col-md-4'>$preg</label>
                   <div class='col-md-8'>
                       <input type='numbe' name='nomp$i' id='nomp$i' class='form-control' />
                   </div>
               </div>";
             
        
                       
           
        $inf->MoveNext();
      
   }
         print"</div></div>";  
        $i=++$i;
    }
       



            
            
            
           
       
    ?>
    