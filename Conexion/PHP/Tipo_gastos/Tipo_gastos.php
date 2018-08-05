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

<title>INTERCEL Tipo de Gastos</title>


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
                            <a class="scroll" href="Tipo_gastos.php" data-hover="Tipo deGastos">
                                Tipo de Gastos
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
                <form method="post" action="Tipo_gastos.php" style="float:center;">
                                
                                <select name="Buscador">
                                    <option value="tpg.tpg_id">Id</option>
                                    <option value="tpg.tpg_nombre">Nombre</option>
                                    <option value="tpg.tpg_descripcion">Descripcion</option>
                                    <option value="tpg.tpg_monto">Monto</option
                                </select>
                               
                               <input type="text" name="Buscado" value="">
                              <input type="Submit" name="Buscar" value="Buscar">
                              
                </form>
                <nav>
                    
                    <ul class="cl-effect-16">
                         <li>
                            <a class="scroll" href="Nuevo_gasto.php" data-hover="Nuevo">
                               Nuevo
                           </a>
                        </li>
                        <li>
                            <a class="scroll" href="reporte_tpg.php" data-hover="Reporte">
                               Reporte
                               
                           </a>
                        </li>
                     </ul>
                </nav>
         </div>
					 
                                    <?php
                                     require_once "../../Conexion/Sentencias_sql.php"; 
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    
                    if (isset($_POST['Buscar'])) {
                        $buscador = $_POST['Buscador'];
                        $buscado = $_POST['Buscado'];
                        
                    
    $resultado = $datos->consultar("select * from tipo_gastos where ".$buscador." = '".$buscado."'"); 
                     }else {
                                   
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
    $resultado = $datos->consultar("select * from tipo_gastos"); 
                                    //
                    }
                                    ?>               
                                    
                                         <table class="width200">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre </th>
                                                    <th>Descripción</th>
                                                    <th>Monto</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                                
                                                ?> 
                                            
                                               
                                                <tr>
                                                    <td >
                                                             <?php echo $row['tpg_id'];?>
                                                    </td>
                                                    <td>
                                                            <?php echo $row['tpg_nombre']; ?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['tpg_descripcion'];?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['tpg_monto'];?>
                                                    </td>
                                                    
                                                    <td>
                                                        <form method="post" action="Modifica_gasto.php"">
                                                            <input type="hidden" name="id" value="<?php echo $row['tpg_id'];?>" />
                                                            <input type="Submit" name="Actializar" value="Actializar">
                                                        </form>
                                                     
                                                    </td>
                                                                                                            
                                                </tr>
                                        <?php 
                                        
                                        }
                    
                                        $datos->cerrar_bd();       
                                        
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