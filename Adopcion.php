 <?php
    include_once("./Utilerias/database_utilerias.php");
    if(!isset($_SESSION))  session_start();
    $idu=$_SESSION['IdUsuario']; 
    $idm = isset($_REQUEST['idm'])?$_REQUEST['idm']:1;
    $i=0;
    $inf=consultaMascota3($idm);
    $res=consultaUsu($idu);
    include_once("Menu.php");
    
        print" <div class='container'><div class='row'>";
        while (!$inf->EOF) {
       $idm=$inf->fields['IdClase'];       
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
                    </div>
                  </div>
                </div>
              </div>
            </div>";
      
        
           
        $inf->MoveNext();
      
   }
    
         print"</div></div>";  

        print" <div class='container'>
         <h3> Informacion Del Usuario a Adoptar</h3>
        <div class='row'>";
        while (!$res->EOF) {      
       $nom=$res->fields['NomUsuario'];
       $cor=$res->fields['Correo'];
       $dom=$res->fields['Domicilio'];
       $telf=$res->fields['TelefonoFijo'];
       $telm=$res->fields['TelefonoMovil'];
       $curp=$res->fields['CURP'];
           print "
                <div class='col-xs-5 col-md-4'>
                 <div class='card mb-4 box-shadow'>
                <div class='card-body'>
                  <p class='card-text'>Nombre: $nom</p>
                  <p class='card-text'>Sexo: $cor</p>
                  <p class='card-text'>Tamanaño: $dom</p>
                  <p class='card-text'>Edad: $telf</p>
                  <p class='card-text'>Salud:  $telm</p>
                  <p class='card-text'>Descripcion: $curp</p>
                  <div class='d-flex justify-content-between align-items-center'>
                  <a href='GeneraPdf.php?idm=$idm &idu=$idu' class='btn btn-dark'>Adoptar</a>
                    
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>";
      
        
           
        $res->MoveNext();
      
   }
    
         print"</div></div>"; 
    
    
       
    ?>
    