<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Class_Factura
 *
 * @author Jossué
 */
require_once "../../Conexion/Sentencias_sql.php"; 
require_once "../Caja/Class_Caja.php";

class Class_Factura {
    function nueva($cliente){
       try {
        $fecha = date("Y-m-d");
        $hora  = date("H:i:s");
        //echo "id cliente".$cliente;
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        $datos->sql("insert into factura "
                    ."(f_cliente,f_fecha,f_hora)"
                    . "Values ("
                    . "'$cliente',"
                    . "'$fecha',"
                    . "'$hora')"
                    ,"Neva factura creada");
       } catch (Exception $ex) {
                echo $ex;
       }
    }
    function total_factura($factura){
      try {
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        
        $resultado = $datos->consultar("select sum(df.df_cantidad * df.df_monto) as total
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
                        $total = $row['total'];
                          
                    }
                    
                    return $total;
      } catch (Exception $ex) {
            echo $ex;
      }
    }
    function articulos_factura($factura){
      try {
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        
        $resultado = $datos->consultar("select sum(df.df_cantidad) as total
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
                        $total = $row['total'];
                          
                    }
                    
                    return $total;
      } catch (Exception $ex) {
            echo $ex;
      }
    }
    function agregar($factura, $producto, $cantidad, $monto){
        try{
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        
$datos->sql("INSERT INTO Detalle_factura (df_factura,df_producto,df_cantidad,df_monto) VALUES "
                    ."('".$factura."', "
                    ."'".$producto."', "
                    ."'".$cantidad."', "
                    ."'".$monto."') "
                    ,"Dato agregado");
        

        $datos->sql("UPDATE Producto SET "
                    ."p_cantidad = p_cantidad -'".$cantidad."'"
                    ."WHERE p_id ='".$producto."';","Stock rebajado");
              
         
        } catch (Exception $ex) {
            echo $ex;
        }
       
    }
    function ultima_factura(){
        try{
            $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        $resultado = $datos->consultar("SELECT MAX(f_id) as f_id from factura;");
            if ($resultado)
                while($row = mysqli_fetch_array($resultado))
                    {
                        $latest_id = $row['f_id'];
                          
                    }
                   
            return $latest_id;
        } catch (Exception $ex) {

        }
    }
    function confirmar($factura,$total,$caja){
        try{
$datos = new Sentencias_sql();
$datos->conexion();
$datos->abrir_bd();

$hora  = date("H:i:s");
$motivo="Venta";
$descripcion= "Venta en la factura No. ".$factura;
$sql="INSERT INTO detalle_caja (dc_caja,dc_ingreso,dc_hora,dc_motivo,dc_descripcion) VALUES "
        ."('".$caja."', "
        ."'".$total."',"
        ."'".$hora."',"
        ."'".$motivo."',"
        ."'".$descripcion."')";
echo "<br>".$sql;
$mensaje="Venta confirmada";
$datos->sql($sql, $mensaje);
} catch (Exception $ex) {
echo $ex;
}
    }
    
}
