<?php
	session_start();
	 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	 //echo $_SESSION['id_user'];
	} else {
	   echo "Esta pagina es solo para usuarios registrados.<br>";
	   echo "<br><a href='Conexion/login.php'>Login</a>";
	 
	exit;
	}
?>
<!DOCTYPE HTML>
<html>
<head>

<title>INTERCEL Usuarios_nuevo</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Educator Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<link href="../../css/style.css" rel='stylesheet' type='text/css' />	
<link href="../../css/Formato.css" rel='stylesheet' type='text/css' />
<script src="../../js/jquery-1.11.1.min.js"></script>
<script src="../../js/dist/jquery.validate.js" type="text/javascript"></script>
<!--webfonts-->
 <link href='//fonts.googleapis.com/css?family=Poiret+One|Lily+Script+One|Raleway:400,300,500,600,200,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->

</head>
<body>
<!--start-home-->
	<div class="head" id="home">
	    <div class="header-top">
		<div class="container">  
                    <p class="col-md-6 location">
                        <i class="glyphicon glyphicon-map-marker">
                                  
                        </i>INTERCEL
                    </p>
                <div class="clearfix"> </div>
                </div>
            </div>
                    
        <div class="container">  
                
            <div class="main">	
		<div class="wht-head">	
                    <div class="logo">
			<a href="index.html" >
                            <h1>
                                <i class="glyphicon glyphicon-education">
                                    
                                </i>INTERCEL
                            </h1>
                        </a>
                    </div>
					 
            <!--top-nav-->
            <span class="menu"> </span>
            <div class="top-menu">
                <nav>
                    <ul class="cl-effect-16">
                            
			<li>
                            <a class="active scroll" href="../../admin.php" data-hover="Inicio">
                                Inicio
                            </a>
                        </li>
			<li>
                      
			<li>
                            <a class="scroll" href="Usuarios.php" data-hover="Usuarios">
                                Usuarios
                            </a>
                        </li>
			
			<div class="clearfix"></div>
						
                    </ul>
					
                </nav>		
            </div>
					
					<!-- script-for-menu -->
                                <script>
					$( "span.menu" ).click(function() {
					  $( ".top-menu" ).slideToggle( "slow", function() {
						// Animation complete.
					  });
					});
				</script>
				
	<!-- script-for-menu -->
        
        
	<div class="clearfix"></div>
        
                </div>
			 
                <div class="banner_2">
					
                    <div class="banner-slider">
			<div  id="top" class="callbacks_container">
                            
                                    <div class="cuerpo">
					 <!-- segundo menu -->
	 <div class="top-menu">
                <nav>
                    <ul class="cl-effect-16">
                            
			<li>
                            <a class="scroll" href="Nuevo_Usuario.php" data-hover="Nuevo">
                               Nuevo
                           </a>
                        </li>
                    </ul>
                </nav>
         </div>
<script type="text/javascript">
$(document).ready(function() {
    $("#ok").hide();
    $("#form").validate({
        rules: {
            nombre: { required: true},//campos vacios
            apellido: { required: true},
            dpi: { required:true, minlength: 13, maxlength: 13},//no vacios y con un minimo y maximo
            direccion: { required: true},
            user: { required: true,minlength: 4, maxlength: 16},
            pass: { required: true,minlength: 4, maxlength: 16},
            tipo: { required: true}
           
        },
        messages: {
            nombre: "Debe introducir un nombre valido.",
            apellido: "Debe introducir un apellido valido.",
            dpi: "Debe introducir datos validos ",
            direccion: "Debe introducir datos validos ",
            user: "nombre de usuario de 4 a 16 caracteres",
            pass: "contraseña de 4 a 16 caracteres",
            tipo: "Debe introducir datos validos "
            
        },
        submitHandler: function(form){
            form.submit();
        }
    });
});
</script>
                                    <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    //$resultado = $datos->consultar("select * from usuario"); 
                                    //$datos->cerrar_bd();
                                    ?>               
                                    
                    <?php 
                    try {
                    if (isset($_POST['Actualizar'])) {
                        $id_update = $_POST['id_update'];
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $dpi = $_POST['dpi'];
                        $direccion = $_POST['direccion'];
                        $municipio = $_POST['municipio'];
                        $usuario = $_POST['user'];
                        $pass = $_POST['pass'];
                        $tipo = $_POST['tipo'];
                        
                        require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    $datos->sql("update usuario set "
                                            . " u_nombre='$nombre',"
                                            . "u_apellido='$apellido',"
                                            . "u_dpi='$dpi',"
                                            . " u_direccion='$direccion',"
                                            . "u_municipio='$municipio',"
                                            . "u_usuario='$usuario',"
                                            . "u_pass='$pass',"
                                            . "u_tipo='$tipo' "
                                            . "where u_id='$id_update'" 
                                            ,"Modificacion Exitosa");
                        
                        echo "<script type='text/javascript'>
                        alert('Modificacion Exitosa');
                        </script>";
                            //$datos->cerrar_bd();
                    }else{
                       // $id = @$_GET['id'];
                        $id = $_POST['id'];
                        $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //echo "el id es ".$id. " ".@$_GET['u_id'];
$resultado = $datos->consultar("select u.*,m.m_nombre from usuario u join municipio m on (u.u_municipio = m.m_id) where u_id = ".$id." order by u.u_nombre"); 
     
                         if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                        ?>
                                <form method="post"  style="float:center;" id="form">
                                <input type="hidden" name="id_update" value="<?php echo $row['u_id'];?>" />
                                <h4>
				<br>
                                    <p> 
					Nombre:
                                    </p>
				</h4>
			
				<input type="text" name="nombre" value="<?php echo $row['u_nombre']; ?>">
				<br>
                                <h4>
				<br>	
                                    <p> 
					Apellido:
                                    </p>
                                        
				</h4>
			
				<input type="text" name="apellido" value="<?php echo $row['u_apellido'];?>">
				<br>
                                <h4>
				<br>	
                                    <p> 
					DPI:
                                    </p>
                                        
				</h4>
			
				<input type="text" name="dpi" value="<?php echo $row['u_dpi'];?>">
				<br>
                                
                                <h4>
				<br>	
                                    <p> 
					Direccion:
                                    </p>
                                        
				</h4>
			
				<input type="text" name="direccion" value="<?php echo $row['u_direccion'];?>">
				<br>
                                
                                
                                  <h4>
				<br>	
                                    <p> 
					Usuario:
                                    </p>
                                        
				</h4>
                                
				<input type="text" name="user" value="<?php echo $row['u_usuario'];?>">
				<br>
                                
                                  <h4>
				<br>	
                                    <p> 
					Contraseña:
                                    </p>
                                        
				</h4>
			
				<input type="text" name="pass" value="<?php echo $row['u_pass'];?>">
				<br>
                                
                                <h4>
				<br>	
                                    <p> 
					Tipo:
                                    </p>
                                        
				</h4>
			      <input type="text" name="tipo" list="combo_tipo" >
                                <datalist id="combo_tipo">
                                    <option value="Administrador">
                                    <option value="Usuario">
                                </datalist>
				<br>
                                <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    $resultado = $datos->query("select m_id, m_nombre from municipio"); 
                                    $datos->cerrar_bd();
                                    ?> 
                                <h4>
				<br>	
                                    <p> 
					Municipio:
                                    </p>
                                        
				</h4>
                                <select name="municipio">
                                  <?php if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                        $nombre = $row['m_nombre'];
                                        $id = $row['m_id']; 
                                                                         
                                    echo "<option value=".$id.">".$nombre."</option>";
                                    
                                    
                                        }
                                        $datos->cerrar_bd();
                                    ?>
                                </select>
                                       					
				<br>
                                <br>
                                <input type="Submit" name="Actualizar" value="Actualizar">
                                
                               </form>
                                    <?php
                                    }
                    }
                    } catch (Exception $e){
                        echo "<script type='text/javascript'>
                        alert('ocurrio un error' + $e);
                        </script>";
                    }
                                    ?>
                                         <br>
                                    </div>
                               
                        </div>
                    </div>
                </div>
			 <!--banner-slide-->
		<script src="js/responsiveslides.min.js"></script>
				<script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider3").responsiveSlides({
				        auto: true,
				        pager:true,
				        nav:false,
				        speed: 500,
				        namespace: "callbacks",
				        before: function () {
				          $('.events').append("<li>before event fired.</li>");
				        },
				        after: function () {
				          $('.events').append("<li>after event fired.</li>");
				        }
				      });
				
				    });
				  </script>

			 <!--//banner-slide-->
			 <!--end-banner-->
                         <!--footer-->
            <div class="copy">
                <p>&copy; 2017 INTERCEL. Todos los derechos reservados </p>
            </div>
					

	</div>
<link rel="stylesheet" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script> 
	    <script type="text/javascript">
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
                                            
            </script>
	<!--//gallery-->

        </div>
        </div>	

	<!--start-smoth-scrolling-->
	<script type="text/javascript">
            jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
		});
	</script>
	<!--start-smoth-scrolling-->
        <script type="text/javascript">
            $(document).ready(function() {
                var defaults = {
                    containerID: 'toTop', // fading element id
                    //
                    //containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
										
			});
        </script>
		
        <a href="#home" id="toTop" class="scroll" style="display: block;"> 
            <span id="toTopHover" style="opacity: 1;"> 
            </span>
        </a>

</body>
</html>