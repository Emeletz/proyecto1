<!DOCTYPE HTML>
<html>
<head>

<title>INTERCEL Factura</title>

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
                            <a class="active scroll" href="../../index.php" data-hover="Inicio">
                                Inicio
                            </a>
                        </li>
			<li>
                       
			<li>
                            <a class="scroll" href="Factura.php" data-hover="Facturar">
                                Facturar
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
                            <div class="top-menu">
                                <form method="post" action="Nueva_factura.php" style="float:center;">
                                
                                <select name="Buscador">
                                    <option value="p_nombre">Nombre</option>
                                    <option value="p_descripcion">Descricpion</option>
                                </select>
                               
                               <input type="text" name="Buscado" value="">
                              <input type="Submit" name="Buscar" value="Buscar">
                              
                <nav>
                    
                    <ul class="cl-effect-16">
                         
                        <li>
                            <a class="scroll" href="factura_impresa.php" data-hover="Imprimir">
                               Imprimir
                               
                           </a>
                        </li>
                        <li>
                            <a class="scroll" href="Confirmar_venta.php" data-hover="Confirmar">
                               Confirmar venta
                           </a>
                        </li>
                     </ul>
                </nav>
         </div>
                                    <div class="cuerpo">
					 <!-- segundo menu -->
	 
                                    <?php
                                    require_once "../../Conexion/Sentencias_sql.php"; 
                                    require_once "Class_Factura.php";
                                    require_once "../Caja/Class_Caja.php";
                                      try {
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    $operacion = new Class_Factura();
                                    $factura = $operacion->ultima_factura();
                                    
                         
                                    //agrega productos
                        if (isset($_POST['Agregar']))
                        {
                            
                            $producto = $_POST['producto'];
                            $cantidad = $_POST['cantidad'];
                            $monto = $_POST['monto'];
                        $operacion->agregar($factura, $producto, $cantidad, $monto);
                        }
                        
                       
                                    //
                                    
                        $total=$operacion->total_factura($factura);
                        $articulos= $operacion->articulos_factura($factura);
                        echo "Total en factura: Q".$total. " --- No. de articulos: ".$articulos." --- Factura No. ".$factura;

                        //datos del cliente
        $factura = $operacion->ultima_factura();
        $datos->abrir_bd();
        $resultado = $datos->consultar("select c.c_nombre,c.c_apellido,c.c_nit,f.f_id, c.c_direccion, m.m_nombre, d.d_nombre
,(df.df_cantidad * df.df_monto) as total
from detalle_factura df
join factura f on (df.df_factura = f.f_id)
join producto p on (p.p_id = df.df_producto)
join cliente c on (f.f_cliente = c.c_id)
join municipio m on (m.m_id = c.c_municipio)
join departamento d on (d.d_id= m.m_departamento)
                    where f.f_id =".$factura); 
          if ($resultado)
         while($row = mysqli_fetch_array($resultado))
            { 
                    echo "<br>";
                    echo "Cliente: ".$row['c_nombre']." ".$row['c_apellido']." NIT: ".$row['c_nit'];
                    echo "<br>";
                    echo "Direccion: ".$row['c_direccion'].", ".$row['m_nombre'].", ".$row['d_nombre'];
                    break;
         }
        
                         //busqueda de productos
                        if (isset($_POST['Buscar'])) {
                        $buscador = $_POST['Buscador'];
                        $buscado = $_POST['Buscado'];
                       
                    
    $resultado = $datos->consultar("select * from producto where ".$buscador." = '".$buscado."'"); 
                     } else{
                        $resultado = $datos->consultar("select * from producto"); 
                     }
     ?>
                                <table class="width200">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Precio de venta 1</th>
                                                    <th>Precio de venta 2</th>
                                                    <th>Stock</th>
                                                    <th>Cantidad y Precio</th>
                                                    <!--<th>Fecha</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
        <?PHP
                         if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                 ?>
                                                                    
                                     <tr>
                                                    <td >
                                                             <?php echo $row['p_nombre'];?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['p_descripcion'];?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['p_precio_base_venta'];?>
                                                    </td>
                                                    <td>
                                                            <?php echo $row['p_precio_venta']; ?>
                                                    </td>
                                                     <td>
                                                            <?php echo $row['p_cantidad']; ?>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="Nueva_factura.php">
                                                            <input type="text" name="cantidad"/>
                                                            <input type="text" name="monto"/>
                                                            <input type="hidden" name="producto" value="<?php echo $row['p_id'];?>" />
                                                            <input type="Submit" name="Agregar" value="Agregar">
                                                        </form>
                                                     
                                                    </td>
                                                    <td>
                                                    </td>
                                                                                                            
                                                </tr>
                                                 <?php
                                    //fin tabla
                                                 
                                    }
                                    
                                    //tabla de detalle
        $factura = $operacion->ultima_factura();
        $datos->abrir_bd();
        $resultado = $datos->consultar("select df.*, p.p_nombre, p.p_descripcion, c.c_nombre,c.c_apellido,c.c_nit,f.f_id, c.c_direccion, m.m_nombre, d.d_nombre
,(df.df_cantidad * df.df_monto) as total
from detalle_factura df
join factura f on (df.df_factura = f.f_id)
join producto p on (p.p_id = df.df_producto)
join cliente c on (f.f_cliente = c.c_id)
join municipio m on (m.m_id = c.c_municipio)
join departamento d on (d.d_id= m.m_departamento)
                    where f.f_id =".$factura); 
                                            
                    ?>
                          <table class="width200">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Total</th>
                                                    <!--<th>Fecha</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
        <?PHP
                         if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                 ?>
                                                                    
                                     <tr>
                                                    <td >
                                                             <?php echo $row['p_nombre'];?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['p_descripcion'];?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['df_cantidad'];?>
                                                    </td>
                                                    <td>
                                                            <?php echo $row['df_monto']; ?>
                                                    </td>
                                                    <td>
                                                             <?php echo $row['total']; ?>
                                                    </td>
                                                    <td>
                                                    </td>
                                                                                                            
                                                </tr>
                                                 <?php
                                    //fin tabla
                                                 
                                    }                            
                    } catch (Exception $e){
                        echo "<script type='text/javascript'>
                        alert('ocurrio un error' + $e);
                        </script>";
                    }
                                    ?>
                                     </tbody>
                                        </table>
                                   
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