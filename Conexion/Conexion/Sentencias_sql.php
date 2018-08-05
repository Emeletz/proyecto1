<?php


class Sentencias_sql 
{     
     
    private $host     ; 
    private $database;   
    private $user ;      
    private $pass;
    private $charset;
    private $conexion;
    
    public function conexion(){
    $this->host       = 'localhost';
    $this->database   = 'DB_DS';
    //$this->database   = 'DB_facturacion';
    $this->user       = 'root';
    $this->pass       = '';
    $this->charset    = 'utf-8'; 
    }
    
    public function abrir_bd() 
    { 
    
     
        $this->conexion = new mysqli($this->host, $this->user,$this->pass, $this->database);
       
        if ($this->conexion->connect_errno) {
    die( "Fallo la conexión a MySQL: (" . $this->conexion -> connect_errno
    . ") " . $this->conexion -> connect_error);
        }
        
//       return true;
        
    } 
    public function cerrar_bd(){
        //$this->conexion->mysqli_close();
        mysqli_close($this->    conexion);
        
    }
     public function query($consulta){ 
         try{
      $resultado = mysqli_query($this->conexion,$consulta);
         return $resultado;
         
         }catch (Exception $e){
             echo $e;
         }
    }   
    public function consultar($consulta) 
    { 
        $resultado = mysqli_query($this->conexion,$consulta);
      return $resultado; 
    } 
    public function sql($sql,$mensaje)     {   
        try{
        $resultado = mysqli_query($this->conexion,$sql);
        echo "<script type='text/javascript'>
                        alert(".$mensaje." ".$sql.");
                        </script>";
    } catch (Exception $ex) {
    echo "<script type='text/javascript'>
                        alert(Error ".$mensaje." ".$sql.");
                        </script>";
    }
      return $resultado; 
    }
    public function sentencia($sql,$mensaje){
        $result = $this->conexion->query($sql);
       // echo $mensaje;
        echo "<script type='text/javascript'>
                        alert(".$mensaje." ".$sql.");
                        </script>";
        return $result;
    }
    
    public function length($consulta){
      return mysqli_num_rows($consulta);
    }
        
} 
