<!DOCTYPE HTML>
<html>
<head>

<title>INTERCEL Caja</title>


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
                            <a class="active scroll" href="../../index.php" data-hover="Inicio">
                                Inicio
                            </a>
                        </li>
			<li>
                     
			<li>
                            <a class="scroll" href="Caja.php" data-hover="Caja">
                                Caja
                            </a>
                        </li>
                        <li>
                            <a class="scroll" href="Ingreso.php" data-hover="Nuevo Ingreso">
                                Nuevo Ingreso
                            </a>
                        </li>
                        <li>
                            <a class="scroll" href="Egreso.php" data-hover="Nuevo Egreso">
                                Nuevo Egreso
                            </a>
                        </li>
                        <li>
                            <a class="scroll" href="Caja_impresa.php" data-hover="Reporte">
                                Reporte
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
             <form method="post" action="Caja.php" style="float:center;">
                                
                      <input type="Submit" name="Abrir" value="Abrir">
                      <input type="Submit" name="Cerrar" value="Cerrar">
                              
             </form>
               
         </div>
					 
                                    <?php
                                     require_once "../../Conexion/Sentencias_sql.php"; 
                                     require_once "Class_Caja.php";
                                    
                                    $datos = new Sentencias_sql(); 
                                    $datos->conexion();
                                    $datos->abrir_bd();
                                    
                                    $op = new Class_Caja();
                                    $caja= $op->ultima_caja();
                if (isset($_POST['Abrir']))
                        {
                    $op->abrir();
                    $caja= $op->ultima_caja();
                    //echo $caja. " ";
                }                    
                if (isset($_POST['Cerrar']))
                        {
                    
                    //echo $caja. " ";
                    $op->cerrar($caja);
                }
                  
    $resultado = $datos->consultar("select *from caja where cj_id=".$caja);
        if ($resultado)
            while($row = mysqli_fetch_array($resultado))
                {            
                    echo "Fecha de Apertura: ".$row['cj_fecha_apertura']."<br>";
                    echo "Hora de Apertura: ".$row['cj_hora_apertura']."<br>";
                    break;
                }
                  
                                    //$datos->sentencia("insert into categoria (ct_nombre) values ('nueva')","Registro exitoso");
   $resultado = $datos->consultar("select sum(dc_ingreso) as ingreso, sum(dc_egreso) as egreso, (sum(dc_ingreso) - sum(dc_egreso)) as total from  detalle_caja");
                           ?>               
                                    
                                         <table class="width200">
                                            <thead>
                                                <tr>
                                                    <th>Igresos</th>
                                                    <th>Egresos</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                                
                                                ?> 
                                              <tr>
                                                    <td >
                                                             <?php echo $row['ingreso'];?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['egreso'];?>
                                                    </td>
                                                    <td>
                                                            <?php echo $row['total']; ?>
                                                    </td>
                                                    
                                                                                                            
                                                </tr>
                                        <?php 
                                        
                                        }
                    
                                        //$datos->cerrar_bd();       
                                        
                                        ?> 
                                            </tbody>
                                        </table>
                              <!-- fin primera tabla-->
                              
                              <?php
                              $datos->abrir_bd();
                              
       $resultado = $datos->consultar("select * from  detalle_caja WHERE dc_caja =".$caja);
                         
                              ?>
                              <table class="width200">
                                            <thead>
                                                <tr>
                                                    <th>Igresos</th>
                                                    <th>Egresos</th>
                                                    <th>Hora</th>
                                                    <th>Motivo</th>
                                                    <th>Descripcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($resultado)
                                    while($row = mysqli_fetch_array($resultado))
                                        { 
                                                
                                                ?> 
                                              <tr>
                                                    <td >
                                                             <?php echo $row['dc_ingreso'];?>
                                                    </td>
                                                    <td >
                                                             <?php echo $row['dc_egreso'];?>
                                                    </td>
                                                    <td>
                                                            <?php echo $row['dc_hora']; ?>
                                                    </td>
                                                    <td>
                                                            <?php echo $row['dc_motivo']; ?>
                                                    </td>
                                                    <td>
                                                            <?php echo $row['dc_descripcion']; ?>
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