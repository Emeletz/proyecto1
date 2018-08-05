<?php
require_once "../../Conexion/Sentencias_sql.php"; 
require_once "Class_Factura.php";
require_once "../Caja/Class_Caja.php";
try{
$x =new Class_Factura();
$y = new Class_Caja();
$caja=$y->ultima_caja();
$factura= $x->ultima_factura();
$total=$x->total_factura($factura);
$x->confirmar($factura, $total,$caja);
header("Location: Nueva_factura.php");
} catch (Exception $ex) {
echo $ex;
}
?>

