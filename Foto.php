 <?php
    include_once("./Utilerias/database_utilerias.php");
    $idcc = isset($_REQUEST['IdC'])?$_REQUEST['IdC']:1;
    $i=0;
    $inf=consultaMascota2($idcc);
    while($i<=2){
        print" <div class='container-fluid'><div class='row'>";
        while (!$inf->EOF) {
       $idm=$inf->fields['IdMascota'];       
       $nom=$inf->fields['NomMascota'];
       $sexo=$inf->fields['Sexo'];
       $tama=$inf->fields['Tamano'];
       $Edad=$inf->fields['Edad'];
       $Salud=$inf->fields['Salud'];
       $Descr=$inf->fields['Descripcion'];
       $fot=$inf->fields['Foto'];
        
           print "
                <div class='col-xs-5 col-md-4'>
                 <div class='card mb-4 box-shadow'>
                <a href='#' class='thmbnail'><img class='card-img-top img-fluid rounded-circle' src='./img/$fot' alt='Card image cap'></a>
                <div class='card-body'>
                  <p class='card-text'>Nombre: $nom</p>
                  <p class='card-text'>Sexo: $sexo</p>
                  <p class='card-text'>Tamanaño: $tama</p>
                  <p class='card-text'>Edad: $Edad</p>
                  <p class='card-text'>Salud:  $Salud</p>
                  <p class='card-text'>Descripcion: $Descr</p>
                  <div class='d-flex justify-content-between align-items-center'>
                    <div class='btn-group' align='center'>
                     <a href='Adopcion.php?idm=$idm' class='btn btn-dark'>Adoptar</a>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>";
      
        
           
        $inf->MoveNext();
      
   }
    
         print"</div></div>";  
        $i=++$i;
    
}

 //for($h=0;$h<=2;++$h){
                
   //        }
     //    $h=0; 



            
            
            
           
       
    ?>
    