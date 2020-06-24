<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<header>
	     <?php include_once("Menu.php"); ?> 
	</header>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Ingresa Ahora!
					</span>

					<a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="img/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Correo
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="corrA" id="corrA" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="pass">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="button" class="login100-form-btn" name="aceptar" id="aceptar" value="Aceptar">
							Ingresar
						</button>
					</div>
					<div class="container-login100-form-btn m-t-17">
						<button type="button" class="login100-form-btn" data-target="#loginmodal" data-toggle="modal" id="reg" name="reg">Registrate
						</button>
					</div>
                   <div id="msg" align="center"></div>
					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="#" class="txt2 bo1">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

<div class="container">
         <div class="row">
             <div class="col-xs-12">
                 <div class="modal" id="loginmodal" tabindex="-1">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" align="center">Registrate</h4>
                 </div>
    <div class="modal-body">
               <form class="form-horizontal" id="frm1" name="frm1" method="">
               
            <div class="form-group">
               <div class="row">
                <label for="corr" class="control-label col-md-2">Correo:</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="corr" name="corr">
                </div>
            </div>
            </div>
            
            <div class="form-group">
               <div class="row">
                <label for="contr" class="control-label col-md-2">Contraseña:</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" id="contr" name="contr">
                </div>
            </div>
            </div>
            <div class="form-group">
               <div class="row">
                <label for="nomcom" class="control-label col-md-2">Nombre Completo:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="nomcom" name="nomcom">
                </div>
            </div>
            </div>
           <div class="form-group">
               <div class="row">
                <label for="dom" class="control-label col-md-2">Domicilio:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="dom" name="dom">
                </div>
            </div>
            </div>
            
            <div class="form-group">
               <div class="row">
                <label for="codp" class="control-label col-md-2">Codigo Postal:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="codp" name="codp">
                </div>
            </div>
            </div>
            
            <div class="form-group">
               <div class="row">
                <label for="telef" class="control-label col-md-2">TelefonoFijo:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="telef" name="telef">
                </div>
                </div>
            </div>
            
            <div class="form-group">
               <div class="row">
                <label for="telm" class="control-label col-md-2">TelefonoMovil:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="telm" name="telm">
                </div>
                </div>
            </div>
            
             <div class="form-group">
               <div class="row">
                <label for="cur" class="control-label col-md-2">CURP:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="cur" name="cur">
                </div>
                 </div>
            </div> 
            
          
             </form>
                 </div>
                
                 <div class="modal-footer">
                     <button type="button" id="guardaReg" name="guardaReg" class="btn btn-success" data-dismiss="modal" value="Guardar">Guardar</button>
                 </div>
             </div>
         </div>
     </div>
             </div>
         </div>
     </div>









	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $("#aceptar").click(function(){
         var parametros = 'corr='+$("#corrA").val()+
            '&pass='+$("#pass").val();
       alert(parametros);
         $.ajax({
             url:"ValidacionU.php",
             type:"post",
             data:parametros,
             success:function(respuesta){
                    alert(respuesta);
                 if($.trim(respuesta)=='1')
                     {
                       document.location.href="MenuAdm.php";
                       
                     }
                 if($.trim(respuesta)=='2')
                     {
                       document.location.href="Index.php";
                       
                     }
                 if($.trim(respuesta)=='-100')
                     {
                       $("#msg").html("Contraseña o Usuario incorrecta");
                       $("#corr").focus();
                       
                     }
             }//fin del success
         });//fin del ajax
    });
       $("#guardaReg").click(function(){
         
        var correo=$("#corr").val();
        var parametros = 'nom='+$("#nomcom").val()+
            '&corr='+$("#corr").val()+
            '&contr='+$("#contr").val()+
            '&dom='+$("#dom").val()+
            '&telef='+$("#telef").val()+
            '&telm='+$("#telm").val()+
            '&cur='+$("#cur").val();
         alert(parametros);
          $.ajax({
             url:"RegistroUser.php",
             type:"post",
             data:parametros,
             success:function(respuesta){
                    alert(respuesta);
                 if($.trim(respuesta)=='1')
                     {
                       
                       $("#corrA").val(correo); 
                       $("#corr").val("");
                        $("#contr").val("");
                         $("#nomcom").val("");
                         $("#dom").val("");
                         $("#telef").val("");
                         $("#telm").val("");
                         $("#cur").val("");
                         $("#corrA").focus();
                     }
                 else
                 {
                     $("#msg").html("Error no se registro");
                 }
             }//fin del success
         });//fin del ajax
         
         
    });
 </script>
</body>
</html>