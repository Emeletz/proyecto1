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

<title>INTERCEL Modifica Producto</title>

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
                            <a class="scroll" href="Productos.php" data-hover="Usuarios">
                                Productos
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
                              </ul>
                </nav>
         </div>
 <script type="text/javascript">
$(document).ready(function() {
    $("#ok").hide();
    $("#form").validate({
        rules: {
            cantidad: { required: true},//campos vacios
            precio_costo: { required: true},
            precio_base_v: { required: true},
            fecha_compra: { required: true},
            precio_venta: { required: true},
            comprobante: { required: true},
            nombre: { required: true},
            descripcion: { required: true},
            cant_minima: { required: true}
            
           
        },
        messages: {
            cantidad: "Debe introducir una cantidad",
            precio_costo: "Debe introducir un precio costo",
            precio_base_v: "Debe introducir un precio base venta",
            fecha_compra: "Debe introducir una fecha de compra",
            precio_venta: "Debe introducir un precio venta",
            comprobante: "Debe introducir un comprobante",
            nombre: "Debe introducir un nombre",
            descripcion: "Debe introducir una descripcion",
            cant_minima: "Debe introducir una cantidad minima"
            
            
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
                        $ubicacion = $_POST['ubicacion'];
                        $proveedor = $_POST['proveedor'];
                        $categoria = $_POST['categoria'];
                        $cantidad = $_POST['cantidad'];
                        $precio_costo = $_POST['precio_costo'];
                        $precio_base_v = $_POST['precio_base_v'];
                        $fecha_compra = $_POST['fecha_compra'];
                        $precio_venta = $_POST['precio_venta'];
                        $comprobante = $_POST['comprobante'];
                        $nombre = $_POST['nombre'];
                        $descripcion = $_POST['descripcion'];
                        $cant_minima = $_POST['cant_minima'];
                        
                        require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    $datos->sql("update producto set "
                                            . "p_hubicacion='$ubicacion',"
                                            . "p_proveedor='$proveedor',"
                                            . "p_categoria='$categoria',"
                                            . "p_cantidad='$cantidad',"
                                            . "p_precio_costo='$precio_costo',"
                                            . "p_precio_base_venta='$precio_base_v',"
                                            . "p_fecha_comra='$fecha_compra',"
                                            . "p_precio_venta='$precio',"
                                            . "p_comprobante='$comprobante',"
                                            . "p_nombre='$nombre',"
                                            . "p_descripcion='$descripcion',"
                                            . "p_cantidad_minima='$cant_minima'"
                                            . "where p_id='$id_update'" 
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
$sql="select p.*, c.ct_nombre, pv.pv_nombre, h.h_nombre,(p.p_cantidad * p.p_precio_costo) as inversion, (p.p_precio_base_venta - p.p_precio_costo) as ganancia1, (p.p_precio_venta - p.p_precio_costo)as ganancia2, ((p.p_precio_base_venta * p.p_cantidad)-(p.p_cantidad * p.p_precio_costo)) as gtotal1,
 ((p.p_precio_venta * p.p_cantidad)-(p.p_cantidad * p.p_precio_costo)) as gtotal2 from  producto p join categoria c on (p.p_categoria = c.ct_id) join proveedor pv on (p.p_proveedor= pv.pv_id) join ubicacion h on (p.p_hubicacion = h.h_id) where p_id = ".$id." order by p.p_nombre;";
                                    //echo $sql;
$resultado = $datos->consultar($sql); 
     
                         if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                        ?>
                                <form method="post"  style="float:center;" id="form">
                                <input type="hidden" name="id_update" value="<?php echo $row['p_id'];?>" />
                  
                 
                                    <h4>
   
                <br>    
                                    <p> 
                    Cantidad:
                                    </p>
                                        
                </h4>
            
                <input type="number" name="cantidad" required="required" value="<?php echo $row['p_cantidad'];?>">
                <br>
                                
                                
                                  <h4>
                <br>    
                                    <p> 
                    Precio Costo:
                                    </p>
                                        
                </h4>
                                
                <input type="number" name="precio_costo" required="required" value="<?php echo $row['p_precio_costo'];?>">
                <br>
                                
                                  <h4>
                <br>    
                                    <p> 
                    Precio Base Venta:
                                    </p>
                                        
                </h4>
            
                <input type="number" name="precio_base_v" required="required" value="<?php echo $row['p_precio_base_venta'];?>">
                <br>
                                
                                   <h4>
                <br>    
                                    <p> 
                    Fecha Compra:
                                    </p>
                                        
                </h4>
            
                <input type="date" name="fecha_compra" required="required" value="<?php echo $row['p_fecha_comra'];?>" placeholder="AAAA-MM-DD">
                <br>
                                
                                    <h4>
                <br>    
                                    <p> 
                    Precio Venta:
                                    </p>
                                        
                </h4>
            
                <input type="number" name="precio_venta" required="required" value="<?php echo $row['p_precio_venta'];?>">
                <br>
                                
                                   <h4>
                <br>    
                                    <p> 
                    Comprobante:
                                    </p>
                                        
                </h4>
            
                <input type="text" name="comprobante" required="required" value="<?php echo $row['p_comprobante'];?>">
                <br>

                 <h4>
                <br>    
                                    <p> 
                    Nombre:
                                    </p>
                                        
                </h4>
            
                <input type="text" name="nombre" required="required" value="<?php echo $row['p_nombre'];?>">
                <br>

                                    <h4>
                <br>    
                                    <p> 
                    Descripción:
                                    </p>
                                        
                </h4>
            
                <input type="text" name="descripcion" required="required" value="<?php echo $row['p_descripcion'];?>">
                <br>

                                                    <h4>
                <br>    
                                    <p> 
                    Cantidad Mínima:
                                    </p>
                                        
                </h4>
            
                <input type="number" name="cant_minima" required="required" required="required" value="<?php echo $row['p_cantidad_minima'];?>">
                <br>
                <br>
                 <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    $resultado1 = $datos->query("select h_id, h_nombre from ubicacion"); 
                                // $datos->cerrar_bd();
                                    ?> 

                   <h4>
                <br>    
                                    <p> 
                   Ubicación:
                                    </p>
                                        
                </h4>
                    <select name="ubicacion">
                     <?php if ($resultado1)
                        while($row = mysqli_fetch_array($resultado1))
                         {$nombre = $row['h_nombre'];
                         $id = $row['h_id']; 
                        echo "<option value=".$id.">".$nombre."</option>";}
                //$datos->cerrar_bd();
                ?>
                </select>                                         
                <br>

                                    <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    $resultado2 = $datos->query("select pv_id, pv_nombre from proveedor"); 
                                    //$datos->cerrar_bd();
                                    ?> 
                 
               
                                  
                                                                  <h4>
                <br>    
                                    <p> 
                    Proveedor:
                                    </p>
                                        
                </h4>
                                <select name="proveedor">
                                  <?php if ($resultado2)
                                    while($row = mysqli_fetch_array($resultado2))
                                        { 
                                        $nombre = $row['pv_nombre'];
                                        $id = $row['pv_id']; 
                                                                         
                                    echo "<option value=".$id.">".$nombre."</option>";
                                    
                                    
                                        }
                                        //$datos->cerrar_bd();
                                    ?>
                                </select>
                                                        
                <br>
 <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    $resultado3 = $datos->query("select ct_id, ct_nombre from categoria"); 
                                    //$datos->cerrar_bd();
                                    ?> 
             
                                <h4>
                <br>    
                                    <p> 
                    Categoría:
                                    </p>
                                        
                </h4>
                                <select name="categoria">
                                  <?php if ($resultado3)
                                    while($row = mysqli_fetch_array($resultado3))
                                        { 
                                        $nombre = $row['ct_nombre'];
                                        $id = $row['ct_id']; 
                                                                         
                                    echo "<option value=".$id.">".$nombre."</option>";
                                    
                                    
                                        }
                                        //$datos->cerrar_bd();
                                    ?>
                                </select>

                          
                                    <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    //$resultado = $datos->consultar("select * from usuario"); 
                                    //$datos->cerrar_bd();
                                    ?> 
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