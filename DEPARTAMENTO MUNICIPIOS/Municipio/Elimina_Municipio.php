<!DOCTYPE HTML>
<html>
<head>

<title>INTERCEL Elimina_Proveedor</title>

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
                <h1><i class="glyphicon glyphicon-education"></i>INTERCEL</h1>
            </a>
        </div>
        <!--top-nav-->
            <span class="menu"> </span>
            <div class="top-menu">
                <nav>
                    <ul class="cl-effect-16">
                        <li><a class="active scroll" href="../../index.php" data-hover="Inicio">Inicio</a></li>
                        <li><a class="scroll" href="#Carreras" data-hover="Productos">Productos</a></li>
                        <li><a class="scroll" href="../Proveedores/Proveedor.php" data-hover="Proveedores">Proveedores</a></li>
                        <li><a class="scroll" href="login.php" data-hover="Facturar">Facturar</a></li>
                        <li><a class="scroll" href="#about" data-hover="Caja">Caja</a></li>
                        <li><a class="scroll" href="../Usuarios/Usuarios.php" data-hover="Usuarios">Usuarios</a></li>
                        <li><a class="scroll" href="#contact" data-hover="Reportes">Reportes</a></li>
                        <li><a class="scroll" href="../Bodega/Bodega.php" data-hover="Bodega">Bodega</a></li>
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
                        <li><a class="scroll" href="Nuevo_Municipio.php" data-hover="Nuevo">Nuevo</a></li>
                        <li><a class="scroll" href="Municipio.php" data-hover="Municipio">Municipio</a></li>
                        <li><a class="scroll" href="../Departamento/Departamento.php" data-hover="Departamento">Departamento</a></li>
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
                try {
                    if (isset($_POST['Delete'])) {
                        $id = $_POST['did'];
                        $datos = new Sentencias_sql(); 
                        $datos->conexion();
                        $datos->abrir_bd();
                        $datos->sql("delete from Municipio where m_id = ".$id."","Eliminado");
                        echo "<script type='text/javascript'>
                        alert('Elemento Eliminado');
                        </script>";
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