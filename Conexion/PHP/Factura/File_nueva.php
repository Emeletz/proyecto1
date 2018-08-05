<?php
require_once "../../Conexion/Sentencias_sql.php"; 
require_once "Class_Factura.php";
try{
$cliente=$_POST['id'];
//echo "id cliente".$cliente;
$x =new Class_Factura();
$x->nueva($cliente);
header("Location: Nueva_factura.php");
} catch (Exception $ex) {
echo $ex;
}
?>

