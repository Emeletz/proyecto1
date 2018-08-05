<?php
	session_start();
?>
<?php
require_once "Sentencias_sql.php"; 
require_once "Validacion.php"; 
     try{ 
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
           
             $v = new Validacion();
             if($rol==$admin){
                 $v->admin();
             }else if($rol== $user){
                 $v->usuario();
             }
           
            //header("Location: ../admin.php");
            }else {
           echo "Usuario, rol o contraseña incorrectas.";
	   echo "<br><a href='Login.php'>Volver a Intentarlo</a>";
            }
     }catch (Exception $ex) {
        echo $ex;
        }
    

?>