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

<title>INTERCEL Nuevo_Producto2</title>

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
<script type="text/javascript">
$(function(){
  var x;
  x=$("tr");
  x.mouseover(entraMouse);
  x.mouseout(saleMouse);
  //x.click();
});


function entraMouse()
{
    //#00CED1
  $(this).css("background-color","#D3D3D3");
}

function saleMouse()
{
  $(this).css("background-color","#fff");
}
</script>
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
                <h1><i class="glyphicon glyphicon-education"></i>INTERCEL</h1>
            </a>
        </div>
        <!--top-nav-->
            <span class="menu"> </span>
            <div class="top-menu">
                <nav>
                    <ul class="cl-effect-16">
                        <li><a class="active scroll" href="../../admin.php" data-hover="Inicio">Inicio</a></li>
                        
                         <li><a class="scroll" href="Productos.php" data-hover="Productos">Productos</a></li>
                        <div class="clearfix"></div>
                    </ul>
				</nav>            
            </div>
			<!-- script-for-menu -->
            <script>
                $( "span.menu" ).click(function() {
				$( ".top-menu" ).slideToggle( "slow", function() {
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
         <?php
                require_once "../../Conexion/Sentencias_sql.php"; 
                $datos = new Sentencias_sql(); 
                $datos->conexion();
                $datos->abrir_bd();
        ?>               
      <?php
                        require_once "../../Conexion/Sentencias_sql.php";
                       
                                    
                     try { 
                       if (isset($_POST['Guardar'])) {
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
                                    $datos->sql("insert into producto"
                                            . "(p_hubicacion,p_proveedor,p_categoria, p_cantidad, p_precio_costo, p_precio_base_venta, p_fecha_comra,"
                                            . "p_precio_venta, p_comprobante, p_nombre, p_descripcion, p_cantidad_minima) "
                                            . "Values "
                                            . "('$ubicacion','$proveedor','$categoria','$cantidad','$precio_costo','$precio_base_v','$fecha_compra',"
                                            . "'$precio_venta','$comprobante','$nombre','$descripcion','$cant_minima')","Ingreso Exitoso");

                                    $fecha = date("Y-m-d");
                                    $hora  = date("H:i:s"); 
                                    $motivo ="Insert en Productos";
                                    
                                    $sql="insert into auditoria "
                                            . "(ad_usuario,ad_fecha,ad_hora,ad_motivo)"
                                            . "Values"
                                            . "('".$_SESSION['id_user']."',"
                                            . "'".$fecha."',"
                                            . "'".$hora."',"
                                            . "'".$motivo
                                            . "')";
                                    $datos->sql($sql,"Ingreso Exitoso");

                        
                       
                        
                        echo "<script type='text/javascript'>
                        alert('Ingreso exitoso');
                        </script>";
                    }else{
                ?>
         <form method="post"  style="float:center;" id="form"> 
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

<h2>Ingresar Nuevo Producto</h2>
                    
                               <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    $resultado = $datos->query("select h_id, h_nombre from ubicacion"); 
                                    //$datos->cerrar_bd();
                                    ?> 
                               
                <br>    
                                    <p> 
                    Ubicacion:
                                    </p>
                                        
                </h4>
                                <select name="ubicacion">
                                  <?php if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                        $nombre = $row['h_nombre'];
                                        $id = $row['h_id']; 
                                                                         
                                    echo "<option value=".$id.">".$nombre."</option>";
                                    
                                    
                                        }
                                        $datos->cerrar_bd();
                                    ?>
                                </select>
                                                        
                <br>



                 <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    $resultado = $datos->query("select pv_id, pv_nombre from proveedor"); 
                                    //$datos->cerrar_bd();
                                    ?> 
                                <h4>
                <br>    
                                    <p> 
                    Proveedor:
                                    </p>
                                        
                </h4>
                                <select name="proveedor">
                                  <?php if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                        $nombre = $row['pv_nombre'];
                                        $id = $row['pv_id']; 
                                                                         
                                    echo "<option value=".$id.">".$nombre."</option>";
                                    
                                    
                                        }
                                        $datos->cerrar_bd();
                                    ?>
                                </select>
                                                        
                <br>

                <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
                                    $resultado = $datos->query("select ct_id, ct_nombre from categoria"); 
                                    //$datos->cerrar_bd();
                                    ?> 
                                <h4>
                <br>    
                                    <p> 
                    Categoría:
                                    </p>
                                        
                </h4>
                                <select name="categoria">
                                  <?php if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                        $nombre = $row['ct_nombre'];
                                        $id = $row['ct_id']; 
                                                                         
                                    echo "<option value=".$id.">".$nombre."</option>";
                                    
                                    
                                        }
                                        $datos->cerrar_bd();
                                    ?>
                                </select>
                                                        
                <br>


                                
                <br><h4><p>Cantidad:</p></h4>
                <input type="text" name="cantidad" id ="cantidad">
                <br><h4><p>Precio Costo:</p></h4>           
                <input type="text" name="precio_costo" id ="precio_costo">
                <br><h4><p>Precio Base Venta:</p></h4> 
                <input type="text" name="precio_base_v" id ="precio_base_v">
                <br><h4><p>Fecha Compra:</p></h4>                                 
                <input type="date" required="required" name="fecha_compra" id ="fecha_compra" placeholder="AAAA-MM-DD">
                <br><h4><p>Precio Venta:</p></h4> 
                <input type="text" name="precio_venta" id ="precio_venta">
                <br><h4><p>Comprobante:</p></h4> 
                <input type="text" name="comprobante" id ="comprobante">
                <br><h4><p>Nombre:</p></h4> 
                <input type="text" name="nombre" id ="nombre">
                <br><h4><p>Descripcion:</p></h4> 
                <input type="text" name="descripcion" id ="descripcion">
                <br><h4><p>Cantidad Minima:</p></h4> 
                <input type="text" name="cant_minima" id ="cant_minima">
                <br>
                <input type="Submit" name="Guardar" value="Guardar" id="Guardar">
                                
                               </form>

                <?php
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
                $(function () {// Slideshow 4
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