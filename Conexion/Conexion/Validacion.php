<?php
	session_start();
?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validacion
 *
 * @author Jossué
 */
 require_once "Sentencias_sql.php"; 
class Validacion {
   
    public function usuario($user,$pass,$rol){
        try{ 
        
        /*$user = $_POST['user'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];*/
        $con = new Sentencias_sql(); 
        $con->conexion();
        $con->abrir_bd();
        $sql="select * from Usuario where  u_usuario='".$user."' and u_pass = '".$pass."' and u_tipo = '".$rol."'";
        $resultado =$con->query($sql);
        
        if ($resultado->num_rows >0)
            { 
             while($row = mysqli_fetch_array($resultado))
             { 
                 $id_user =$row['u_id'];
                 // echo $row['u_id'];
             }
            $_SESSION['loggedin'] = true;
	    $_SESSION['id_user'] = $id_user;
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
           
            header("Location: ../user.php");
            }else {
           echo "Usuario, rol o contraseña incorrectas.";
	   echo "<br><a href='Login.php'>Volver a Intentarlo</a>";
            }
     }catch (Exception $ex) {
        echo $ex;
        }
}
    public function admin($user,$pass,$rol){
        try{ 
        
        /*$user = $_POST['user'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];*/
        $admin = "Administrado";
        $user = "Usuario";
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];
        $con = new Sentencias_sql(); 
        $con->conexion();
        $con->abrir_bd();
        $sql="select * from Usuario where  u_usuario='".$user."' and u_pass = '".$pass."' and u_tipo = '".$rol."'";
        $resultado =$con->query($sql);
        
        if ($resultado->num_rows >0)
            { 
             while($row = mysqli_fetch_array($resultado))
             { 
                 $id_user =$row['u_id'];
                 // echo $row['u_id'];
             }
            $_SESSION['loggedin'] = true;
	    $_SESSION['id_user'] = $id_user;
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
           
            header("Location: ../admin.php");
            }else {
           echo "Usuario, rol o contraseña incorrectas.";
	   echo "<br><a href='Login.php'>Volver a Intentarlo</a>";
            }
     }catch (Exception $ex) {
        echo $ex;
        }
}

function validanull($valor){
   if($valor == ''){
      return false;
   }else{
      return true;
   }
}

}
