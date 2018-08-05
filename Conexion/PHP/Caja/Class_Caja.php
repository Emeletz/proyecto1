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

class Class_Caja {
    function abrir(){
       try {
        $fecha = date("Y-m-d");
        $hora  = date("H:i:s");
        //echo "id cliente".$cliente;
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        $datos->sql("INSERT INTO caja "
                    ."(cj_fecha_apertura,cj_hora_apertura)"
                    . "Values ("
                    . "'$fecha',"
                    . "'$hora')"
                    ,"Se abrio caja");
       } catch (Exception $ex) {
                echo $ex;
       }
    }
    function cerrar($caja){
       try {
        $fecha = date("Y-m-d");
        $hora  = date("H:i:s");
        //echo "id cliente".$cliente;
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        $datos->sql("update caja set "
                    ." cj_fecha_cierre = '".$fecha."', "
                    ." cj_hora_cierre ='".$fecha."' "
                    ."WHERE cj_id ='".$caja."'"
                    ,"Se cerro caja");
        echo "update caja set"
                    ."cj_fecha_cierre = '".$fecha."', "
                    ."cj_hora_cierre ='".$fecha."' "
                    ."WHERE cj_id ='".$caja."'";
       } catch (Exception $ex) {
                echo $ex;
       }
    }
    function total_caja(){
      try {
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        
        $resultado = $datos->consultar("select sum(dc_ingreso) as ingreso, sum(dc_egreso) as egreso, (sum(dc_ingreso) - sum(dc_egreso)) as total from  detalle_caja");
        
         if ($resultado)
                while($row = mysqli_fetch_array($resultado))
                    {
                        $total = $row['total'];
                        $ingreso = $row['ingreso'];
                        $egreso = $row['egreso'];
                          
                    }
                    
                    return $total;
      } catch (Exception $ex) {
            echo $ex;
      }
    }
    function agregar_ingreso($caja,$monto,$motivo,$descripcion){
        try{
        $hora  = date("H:i:s");    
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        
$datos->sql("INSERT INTO Detalle_caja (dc_caja,dc_ingreso,dc_hora,dc_motivo,dc_descripcion) VALUES " 
                    ."('".$caja."', "
                    ."'".$monto."', "
                    ."'".$hora."', "
                    ."'".$motivo."', "
                    ."'".$descripcion."') "
                    ,"Dato agregado");
     
            
         
        } catch (Exception $ex) {
            echo $ex;
        }
       
    }
    function agregar_egreso($caja,$monto,$motivo,$descripcion){
        try{
        $hora  = date("H:i:s");    
        $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        
$datos->sql("INSERT INTO Detalle_caja (dc_caja,dc_egreso,dc_hora,dc_motivo,dc_descripcion) VALUES " 
                    ."('".$caja."', "
                    ."'".$monto."', "
                    ."'".$hora."', "
                    ."'".$motivo."', "
                    ."'".$descripcion."') "
                    ,"Dato agregado");
       
            
         
        } catch (Exception $ex) {
            echo $ex;
        }
       
    }
    function ultima_caja(){
        try{
            $datos = new Sentencias_sql(); 
        $datos->conexion();
        $datos->abrir_bd();
        $resultado = $datos->consultar("select max(cj_id) as cj_id from caja;");
            if ($resultado)
                while($row = mysqli_fetch_array($resultado))
                    {
                        $latest_id = $row['cj_id'];
                          
                    }
                   
            return $latest_id;
        } catch (Exception $ex) {

        }
    }
}
